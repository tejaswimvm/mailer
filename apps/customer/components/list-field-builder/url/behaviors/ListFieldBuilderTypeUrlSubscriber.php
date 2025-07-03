<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * ListFieldBuilderTypeUrlSubscriber
 *
 * The save action is running inside an active transaction.
 * For fatal errors, an exception must be thrown, otherwise the errors array must be populated.
 * If an exception is thrown, or the errors array is populated, the transaction is rolled back.
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.8.1
 */

/**
 * @property ListFieldBuilderTypeUrl $owner
 */
class ListFieldBuilderTypeUrlSubscriber extends ListFieldBuilderTypeSubscriber
{
    /**
     * @param CEvent $event
     *
     * @return void
     * @throws MaxMind\Db\Reader\InvalidDatabaseException
     */
    public function _saveFields(CEvent $event)
    {
        $fieldType = $this->owner->getFieldType();
        $typeName  = $fieldType->identifier;

        /** @var ListFieldValue[] $valueModels */
        $valueModels = $this->getValueModels();
        $fields      = [];

        if (!isset($event->params['fields'][$typeName]) || !is_array($event->params['fields'][$typeName])) {
            $event->params['fields'][$typeName] = [];
        }

        /** run validation so that fields will get the errors if any. */
        foreach ($valueModels as $model) {
            if (!$model->validate()) {
                $this->owner->errors[] = [
                    'show'      => false,
                    'message'   => $model->shortErrors->getAllAsString(),
                    'errors'    => $model->shortErrors->getAll(),
                ];
            }
            $fields[] = $this->buildFieldArray($model);
        }

        /** make the fields available */
        $event->params['fields'][$typeName] = $fields;

        /** do the actual saving of fields if there are no errors. */
        if (empty($this->owner->errors)) {
            foreach ($valueModels as $model) {
                $model->save(false);
            }
        }
    }

    /**
     * @param CEvent $event
     *
     * @return void
     * @throws MaxMind\Db\Reader\InvalidDatabaseException
     */
    public function _displayFields(CEvent $event)
    {
        $fieldType = $this->owner->getFieldType();
        $typeName  = $fieldType->identifier;

        /** fields created in the save action. */
        if (isset($event->params['fields'][$typeName]) && is_array($event->params['fields'][$typeName])) {
            return;
        }

        if (!isset($event->params['fields'][$typeName]) || !is_array($event->params['fields'][$typeName])) {
            $event->params['fields'][$typeName] = [];
        }

        /** @var ListFieldValue[] $valueModels */
        $valueModels = $this->getValueModels();
        $fields      = [];

        foreach ($valueModels as $model) {
            $fields[] = $this->buildFieldArray($model);
        }

        $event->params['fields'][$typeName] = $fields;
    }

    /**
     * @param CModelEvent $event
     *
     * @return void
     */
    public function _setCorrectLabel(CModelEvent $event)
    {
        $event->params['labels']['value'] = $event->sender->field->label;
    }

    /**
     * @param CModelEvent $event
     *
     * @return void
     */
    public function _setCorrectValidationRules(CModelEvent $event)
    {
        /** @var CList $rules */
        $rules = $event->params['rules'];

        /** clear any other rule we have so far */
        $rules->clear();

        /** start adding new rules. */
        if ($event->sender->field->required === 'yes') {
            $rules->add(['value', 'required']);
        }

        $minLength = $event->sender->field->min_length;
        $maxLength = $event->sender->field->max_length;

        $rules->add(['value', 'length', 'min' => $minLength, 'max' => $maxLength]);

        $urlValidator = ['value', 'url'];
        if ($event->sender->field->allowed_scheme) {
            $allowedSchemes = [];
            if ((string)$event->sender->field->allowed_scheme === ListFieldUrl::ALLOWED_SCHEME_HTTPS) {
                $allowedSchemes = ['https'];
            } elseif ((string)$event->sender->field->allowed_scheme === ListFieldUrl::ALLOWED_SCHEME_HTTP) {
                $allowedSchemes = ['http'];
            } elseif ((string)$event->sender->field->allowed_scheme === ListFieldUrl::ALLOWED_SCHEME_HTTPS_HTTP) {
                $allowedSchemes = ['https', 'http'];
            } elseif ((string)$event->sender->field->allowed_scheme === ListFieldUrl::ALLOWED_SCHEME_ANY) {
                $allowedSchemes = ['https', 'http', 'ftp', 'sftp'];
            }
            if ($allowedSchemes) {
                $urlValidator['validSchemes'] = $allowedSchemes;
            }
        }
        $rules->add($urlValidator);

        if ($event->sender->field->whitelist_domains || $event->sender->field->blacklist_domains) {
            $validatorClass = 'customer.components.list-field-builder.url.validators.ListFieldBuilderTypeUrlDomainsValidator';
            $rules->add([
                'value',
                $validatorClass,
                'whitelistDomains' => array_filter(array_unique(array_map('trim', explode(',', $event->sender->field->whitelist_domains)))),
                'blacklistDomains' => array_filter(array_unique(array_map('trim', explode(',', $event->sender->field->blacklist_domains)))),
            ]);
        }
    }

    /**
     * @param CModelEvent $event
     *
     * @return void
     */
    public function _setCorrectHelpText(CModelEvent $event)
    {
        $event->params['texts']['value'] = $event->sender->field->help_text;
    }

    /**
     * @return array
     * @throws MaxMind\Db\Reader\InvalidDatabaseException
     * @throws CException
     */
    protected function getValueModels(): array
    {
        $fieldType  = $this->owner->getFieldType();
        $list       = $this->owner->getList();
        $subscriber = $this->owner->getSubscriber();

        /** @var ListFieldUrl[] $models */
        $models = ListFieldUrl::model()->findAllByAttributes([
            'type_id' => (int)$fieldType->type_id,
            'list_id' => (int)$list->list_id,
        ]);

        /** @var ListFieldValue[] $valueModels */
        $valueModels = [];

        foreach ($models as $model) {
            /** @var ListFieldValue|null $valueModel */
            $valueModel = $subscriber->getListFieldValueModel()->findByAttributes([
                'field_id'      => (int)$model->field_id,
                'subscriber_id' => (int)$subscriber->subscriber_id,
            ]);

            if (empty($valueModel)) {
                $valueModel = $subscriber->createListFieldValueInstance();
            }

            /** setup rules and labels here. */
            $valueModel->onAttributeLabels = [$this, '_setCorrectLabel'];
            $valueModel->onRules = [$this, '_setCorrectValidationRules'];
            $valueModel->onAttributeHelpTexts = [$this, '_setCorrectHelpText'];
            $valueModel->fieldDecorator->onHtmlOptionsSetup = [$this->owner, '_addInputErrorClass'];
            $valueModel->fieldDecorator->onHtmlOptionsSetup = [$this->owner, '_addFieldNameClass'];

            /** set the correct default value. */
            $defaultValue = empty($valueModel->value) ? ListField::parseDefaultValueTags((string)$model->default_value, $subscriber) : $valueModel->value;

            /** assign props */
            $valueModel->field         = $model;
            $valueModel->field_id      = (int)$model->field_id;
            $valueModel->subscriber_id = (int)$subscriber->subscriber_id;
            $valueModel->value         = (string)request()->getPost($model->tag, $defaultValue);

            $valueModels[] = $valueModel;
        }

        return $valueModels;
    }

    /**
     * @param ListFieldValue $model
     *
     * @return array
     */
    protected function buildFieldArray(ListFieldValue $model): array
    {
        /** @var ListFieldUrl $field */
        $field = $model->field;

        $fieldHtml = '';
        $viewFile  = realpath(__DIR__ . '/../views/field-display.php');

        if (!$field->getVisibilityIsNone() || apps()->isAppName('customer')) {
            $visible = $field->getVisibilityIsVisible() || apps()->isAppName('customer');
            $fieldHtml = $this->owner->renderInternal($viewFile, compact('model', 'field', 'visible'), true);
        }

        return (array)hooks()->applyFilters('list_field_builder_type_url_subscriber_build_field_array', [
            'field'      => $field,
            'sort_order' => (int)$field->sort_order,
            'field_html' => $fieldHtml,
        ], $model, $field);
    }
}
