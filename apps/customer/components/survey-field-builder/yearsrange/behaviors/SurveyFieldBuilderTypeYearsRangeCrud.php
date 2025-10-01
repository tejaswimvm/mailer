<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * SurveyFieldBuilderTypeYearsRangeCrud
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
 * @since 1.7.8
 */

/**
 * @property SurveyFieldBuilderTypeYearsRange $owner
 */
class SurveyFieldBuilderTypeYearsRangeCrud extends SurveyFieldBuilderTypeCrud
{
    /**
     * @param CEvent $event
     *
     * @return void
     * @throws Exception
     */
    public function _saveFields(CEvent $event)
    {
        /** @var SurveyFieldType $fieldType */
        $fieldType = $this->owner->getFieldType();
        $survey    = $this->owner->getSurvey();
        $typeName  = $fieldType->identifier;

        if (!isset($event->params['fields'][$typeName]) || !is_array($event->params['fields'][$typeName])) {
            $event->params['fields'][$typeName] = [];
        }

        /** @var array $postModels */
        $postModels = (array)request()->getPost('SurveyField', []);
        if (!isset($postModels[$typeName]) || !is_array($postModels[$typeName])) {
            $postModels[$typeName] = [];
        }

        /** @var SurveyField[] $models */
        $models = [];

        foreach ($postModels[$typeName] as $attributes) {
            /** @var SurveyField|null $model */
            $model = null;

            if (!empty($attributes['field_id'])) {
                $model = SurveyField::model()->findByAttributes([
                    'field_id'  => (int)$attributes['field_id'],
                    'type_id'   => (int)$fieldType->type_id,
                    'survey_id' => (int)$survey->survey_id,
                ]);
            }

            if (isset($attributes['field_id'])) {
                unset($attributes['field_id']);
            }

            if (empty($model)) {
                $model = new SurveyField();
            }

            $this->prepareSurveyFieldModel($model);

            $model->attributes = $attributes;
            $model->type_id    = (int)$fieldType->type_id;
            $model->survey_id  = (int)$survey->survey_id;

            $models[] = $model;
        }

        /** @var int[] $modelsToKeep */
        $modelsToKeep = [];
        foreach ($models as $model) {
            if (!$model->save()) {
                $this->owner->errors[] = [
                    'show'      => false,
                    'message'   => $model->shortErrors->getAllAsString(),
                ];
            } else {
                $modelsToKeep[] = (int)$model->field_id;
            }
        }

        if (empty($this->owner->errors)) {
            $criteria = new CDbCriteria();
            $criteria->compare('survey_id', $survey->survey_id);
            $criteria->compare('type_id', $fieldType->type_id);
            $criteria->addNotInCondition('field_id', $modelsToKeep);
            SurveyField::model()->deleteAll($criteria);
        }

        $fields = [];
        foreach ($models as $model) {
            $fields[] = $this->buildFieldArray($model);
        }

        $event->params['fields'][$typeName] = $fields;
    }

    /**
     * @param CEvent $event
     *
     * @return void
     * @throws CException
     */
    public function _displayFields(CEvent $event)
    {
        /** @var SurveyFieldType $fieldType */
        $fieldType = $this->owner->getFieldType();
        $survey    = $this->owner->getSurvey();
        $typeName  = $fieldType->identifier;

        /** register the add button. */
        hooks()->addAction('customer_controller_survey_fields_render_buttons', [$this, '_renderAddButton']);

        /** register the javascript template. */
        hooks()->addAction('customer_controller_survey_fields_after_form', [$this, '_registerJavascriptTemplate']);

        /** register the assets. */
        $assetsUrl = assetManager()->publish((string)realpath(__DIR__ . '/../assets/'), false, -1, MW_DEBUG);

        /** push the file into the queue. */
        clientScript()->registerScriptFile($assetsUrl . '/field.js');

        /** fields created in the save action. */
        if (isset($event->params['fields'][$typeName]) && is_array($event->params['fields'][$typeName])) {
            return;
        }

        if (!isset($event->params['fields'][$typeName]) || !is_array($event->params['fields'][$typeName])) {
            $event->params['fields'][$typeName] = [];
        }

        /** @var SurveyField[] $models */
        $models = SurveyField::model()->findAllByAttributes([
            'type_id'   => (int)$fieldType->type_id,
            'survey_id' => (int)$survey->survey_id,
        ]);

        $fields = [];
        foreach ($models as $model) {
            $this->prepareSurveyFieldModel($model);
            $fields[] = $this->buildFieldArray($model);
        }

        $event->params['fields'][$typeName] = $fields;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function _registerJavascriptTemplate()
    {
        $model = new SurveyField();
        $this->prepareSurveyFieldModel($model);

        /** @var SurveyFieldType $fieldType */
        $fieldType = $this->owner->getFieldType();
        $survey    = $this->owner->getSurvey();

        /** default view file. */
        $viewFile = realpath(__DIR__ . '/../views/field-tpl-js.php');

        /** and render. */
        $this->owner->renderInternal($viewFile, compact('model', 'fieldType', 'survey'));
    }

    /**
     * @param CEvent $event
     *
     * @return void
     */
    public function _addReadOnlyAttributes(CEvent $event)
    {
    }

    /**
     * @param CModelEvent $event
     *
     * @return void
     */
    public function _prepareSurveyFieldModelSetRules(CModelEvent $event)
    {
        /** @var CList $rules */
        $rules = $event->params['rules'];

        $rules->add(['yearStart, yearEnd', 'length', 'is' => 4]);
        $rules->add(['yearStart, yearEnd', 'numerical', 'integerOnly' => true, 'min' => $event->sender->yearMin, 'max' => $event->sender->yearMax]);
        $rules->add(['yearStart', 'compare', 'compareAttribute' => 'yearEnd', 'operator' => '<']);
        $rules->add(['yearEnd', 'compare', 'compareAttribute' => 'yearStart', 'operator' => '>']);
        $rules->add(['yearStep', 'numerical', 'integerOnly' => true, 'min' => 1, 'max' => 100]);
    }

    /**
     * @param CModelEvent $event
     *
     * @return void
     * @throws CException
     */
    public function _prepareSurveyFieldModelSetLabels(CModelEvent $event)
    {
        /** @var CMap $labels */
        $labels = $event->params['labels'];

        $labels->add('yearStart', t('survey_fields', 'Year start'));
        $labels->add('yearEnd', t('survey_fields', 'Year end'));
        $labels->add('yearStep', t('survey_fields', 'Year step'));
    }

    /**
     * @param CModelEvent $event
     *
     * @return void
     * @throws CException
     */
    public function _prepareSurveyFieldModelSetHelpTexts(CModelEvent $event)
    {
        /** @var CMap $texts */
        $texts = $event->params['texts'];

        $texts->add('yearStart', t('survey_fields', 'Decides with which year to start'));
        $texts->add('yearEnd', t('survey_fields', 'Decides with which year to end'));
        $texts->add('yearStep', t('survey_fields', 'Decides the number of years it jump each iteration'));
    }

    /**
     * @param SurveyField $model
     *
     * @return array
     * @throws Exception
     */
    protected function buildFieldArray(SurveyField $model): array
    {
        /** @var SurveyFieldType $fieldType */
        $fieldType = $this->owner->getFieldType();
        $survey    = $this->owner->getSurvey();

        /** so that it increments properly. */
        $index = $this->owner->getIndex();

        $viewFile = realpath(__DIR__ . '/../views/field-tpl.php');
        $model->fieldDecorator->onHtmlOptionsSetup = [$this->owner, '_addInputErrorClass'];
        $model->fieldDecorator->onHtmlOptionsSetup = [$this, '_addReadOnlyAttributes'];

        return [
            'sort_order' => (int)$model->sort_order,
            'field_html' => $this->owner->renderInternal($viewFile, compact('model', 'index', 'fieldType', 'survey'), true),
        ];
    }

    /**
     * @param SurveyField $model
     *
     * @return void
     */
    protected function prepareSurveyFieldModel(SurveyField $model)
    {
        $model->attachBehavior('_SurveyFieldBuilderTypeYearsRangeModelSettersGetters', [
            'class' => 'customer.components.survey-field-builder.yearsrange.behaviors.SurveyFieldBuilderTypeYearsRangeModelSettersGetters',
        ]);

        $model->onRules                 = [$this, '_prepareSurveyFieldModelSetRules'];
        $model->onAttributeLabels       = [$this, '_prepareSurveyFieldModelSetLabels'];
        $model->onAttributeHelpTexts    = [$this, '_prepareSurveyFieldModelSetHelpTexts'];
    }
}
