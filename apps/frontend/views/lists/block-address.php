<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * This file is part of the MailWizz EMA application.
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.0
 */

/** @var Controller $controller */
$controller = controller();

/** @var string $pageHeading */
$pageHeading = (string)$controller->getData('pageHeading');

/** @var string $appName */
$appName = (string)$controller->getData('appName');

/** @var string $honeypotFieldName */
$honeypotFieldName = (string)$controller->getData('honeypotFieldName');

/** @var BlockEmailRequest $model */
$model = $controller->getData('model');

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderContent} to false
 * in order to stop rendering the default content.
 * @since 1.3.3.1
 */
hooks()->doAction('before_view_file_content', $viewCollection = new CAttributeCollection([
    'controller'    => $controller,
    'renderContent' => true,
]));

// and render if allowed
if ($viewCollection->itemAt('renderContent')) {
    /**
     * This hook gives a chance to prepend content before the active form or to replace the default active form entirely.
     * Please note that from inside the action callback you can access all the controller view variables
     * via {@CAttributeCollection $collection->controller->data}
     * In case the form is replaced, make sure to set {@CAttributeCollection $collection->renderForm} to false
     * in order to stop rendering the default content.
     * @since 1.3.3.1
     */
    hooks()->doAction('before_active_form', $collection = new CAttributeCollection([
        'controller'    => $controller,
        'renderForm'    => true,
    ]));

    // and render if allowed
    if ($collection->itemAt('renderForm')) {
        /** @var CActiveForm $form */
        $form = $controller->beginWidget('CActiveForm'); ?>
        <div class="box box-primary borderless">
            <div class="box-header">
                <div class="pull-left">
                    <h3 class="box-title"><?php echo IconHelper::make('envelope') . $pageHeading; ?></h3>
                </div>
                <div class="pull-right"></div>
                <div class="clearfix"><!-- --></div>
            </div>
            <div class="box-body">
                <?php
                /**
                 * This hook gives a chance to prepend content before the active form fields.
                 * Please note that from inside the action callback you can access all the controller view variables
                 * via {@CAttributeCollection $collection->controller->data}
                 * @since 1.3.3.1
                 */
                hooks()->doAction('before_active_form_fields', new CAttributeCollection([
                    'controller'    => $controller,
                    'form'          => $form,
                ])); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <br />
                        <?php echo t('email_blacklist', '{app} is an email-marketing service that serves companies of all shapes and sizes.', [
                            '{app}' => $appName,
                        ]); ?><br /><br />
                        <?php echo t('email_blacklist', 'With several users/companies sending campaigns to hundreds of millions of recipients, we\'re bound to get abuse reports. '); ?>
                        <br />
                        <?php echo t('email_blacklist', 'We take abuse reports seriously, if you believe a customer is sending unsolicited and or spam email, please report abuse immediately.'); ?>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'email'); ?>
                            <?php echo $form->emailField($model, 'email', $model->fieldDecorator->getHtmlOptions('email')); ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </div>
                        <p>
                            <?php echo t('email_blacklist', 'By completing the form above you will permanently block your email address from receiving any email from {app} customers for the foreseeable future. This could also block genuine emails that you do want to receive from companies or websites that use our service.', [
                                '{app}' => $appName,
                            ]); ?>
                            <br />
                            <?php echo t('email_blacklist', 'Please note, we will send you a confirmation email to make sure you are the owner of the email address!'); ?>
                        </p>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="<?php echo html_encode($honeypotFieldName); ?>" tabindex="-1" autocomplete="<?php echo html_encode($honeypotFieldName); ?>" value=""/>
                        </div>
                    </div>
                </div>
                <?php
                /**
                 * This hook gives a chance to append content after the active form fields.
                 * Please note that from inside the action callback you can access all the controller view variables
                 * via {@CAttributeCollection $collection->controller->data}
                 * @since 1.3.3.1
                 */
                hooks()->doAction('after_active_form_fields', new CAttributeCollection([
                    'controller'    => $controller,
                    'form'          => $form,
                ])); ?>
                <div class="clearfix"><!-- --></div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo IconHelper::make('next') . t('email_blacklist', 'Block my address'); ?></button>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
        <?php
        $controller->endWidget();
    }
    /**
     * This hook gives a chance to append content after the active form.
     * Please note that from inside the action callback you can access all the controller view variables
     * via {@CAttributeCollection $collection->controller->data}
     * @since 1.3.3.1
     */
    hooks()->doAction('after_active_form', new CAttributeCollection([
        'controller'      => $controller,
        'renderedForm'    => $collection->itemAt('renderForm'),
    ]));
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * @since 1.3.3.1
 */
hooks()->doAction('after_view_file_content', new CAttributeCollection([
    'controller'        => $controller,
    'renderedContent'   => $viewCollection->itemAt('renderContent'),
]));
