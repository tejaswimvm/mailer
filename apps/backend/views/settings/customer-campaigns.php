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
 * @since 1.3.4.4
 */

/** @var Controller $controller */
$controller = controller();

/** @var OptionCustomerCampaigns $model */
$model = $controller->getData('model');

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->getData()}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->add('renderContent', false)}
 * in order to stop rendering the default content.
 * @since 1.3.4.3
 */
hooks()->doAction('before_view_file_content', $viewCollection = new CAttributeCollection([
    'controller'    => $controller,
    'renderContent' => true,
]));

// and render if allowed
if ($viewCollection->itemAt('renderContent')) { ?>
    <div class="box box-default borderless">
        <div class="box-header">
            <?php $controller->renderPartial('_customers_tabs'); ?>
        </div>
        <?php
        /**
         * This hook gives a chance to prepend content before the active form or to replace the default active form entirely.
         * Please note that from inside the action callback you can access all the controller view variables
         * via {@CAttributeCollection $collection->controller->getData()}
         * In case the form is replaced, make sure to set {@CAttributeCollection $collection->add('renderForm', false)}
         * in order to stop rendering the default content.
         * @since 1.3.4.3
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
                    <h3 class="box-title"><?php echo t('settings', 'Customer campaigns'); ?></h3>
                </div>
                <div class="box-body">
                    <?php
                /**
                 * This hook gives a chance to prepend content before the active form fields.
                 * Please note that from inside the action callback you can access all the controller view variables
                 * via {@CAttributeCollection $collection->controller->getData()}
                 * @since 1.3.4.3
                 */
                hooks()->doAction('before_active_form_fields', new CAttributeCollection([
                    'controller'    => $controller,
                    'form'          => $form,
                ])); ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'max_campaigns'); ?>
                                <?php echo $form->numberField($model, 'max_campaigns', $model->fieldDecorator->getHtmlOptions('max_campaigns')); ?>
                                <?php echo $form->error($model, 'max_campaigns'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'max_active_campaigns'); ?>
                                <?php echo $form->numberField($model, 'max_active_campaigns', $model->fieldDecorator->getHtmlOptions('max_active_campaigns')); ?>
                                <?php echo $form->error($model, 'max_active_campaigns'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'can_delete_own_campaigns'); ?>
                                <?php echo $form->dropDownList($model, 'can_delete_own_campaigns', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_delete_own_campaigns')); ?>
                                <?php echo $form->error($model, 'can_delete_own_campaigns'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'must_verify_sending_domain'); ?>
                                <?php echo $form->dropDownList($model, 'must_verify_sending_domain', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('must_verify_sending_domain')); ?>
                                <?php echo $form->error($model, 'must_verify_sending_domain'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'can_export_stats'); ?>
                                <?php echo $form->dropDownList($model, 'can_export_stats', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_export_stats')); ?>
                                <?php echo $form->error($model, 'can_export_stats'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'can_use_autoresponders'); ?>
                                <?php echo $form->dropDownList($model, 'can_use_autoresponders', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_use_autoresponders')); ?>
                                <?php echo $form->error($model, 'can_use_autoresponders'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'can_use_timewarp'); ?>
                                <?php echo $form->dropDownList($model, 'can_use_timewarp', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_use_timewarp')); ?>
                                <?php echo $form->error($model, 'can_use_timewarp'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'can_embed_images'); ?>
                                <?php echo $form->dropDownList($model, 'can_embed_images', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_embed_images')); ?>
                                <?php echo $form->error($model, 'can_embed_images'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'can_use_recurring_campaigns'); ?>
                                <?php echo $form->dropDownList($model, 'can_use_recurring_campaigns', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_use_recurring_campaigns')); ?>
                                <?php echo $form->error($model, 'can_use_recurring_campaigns'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'require_approval'); ?>
                                <?php echo $form->dropDownList($model, 'require_approval', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('require_approval')); ?>
                                <?php echo $form->error($model, 'require_approval'); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'show_geo_opens'); ?>
                                <?php echo $form->dropDownList($model, 'show_geo_opens', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('show_geo_opens')); ?>
                                <?php echo $form->error($model, 'show_geo_opens'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'show_24hours_performance_graph'); ?>
                                <?php echo $form->dropDownList($model, 'show_24hours_performance_graph', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('show_24hours_performance_graph')); ?>
                                <?php echo $form->error($model, 'show_24hours_performance_graph'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'show_top_domains_opens_clicks_graph'); ?>
                                <?php echo $form->dropDownList($model, 'show_top_domains_opens_clicks_graph', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('show_top_domains_opens_clicks_graph')); ?>
                                <?php echo $form->error($model, 'show_top_domains_opens_clicks_graph'); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'abuse_reports_email_notification'); ?>
                                <?php echo $form->dropDownList($model, 'abuse_reports_email_notification', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('abuse_reports_email_notification')); ?>
                                <?php echo $form->error($model, 'abuse_reports_email_notification'); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'subscribers_at_once'); ?>
                                <?php echo $form->numberField($model, 'subscribers_at_once', $model->fieldDecorator->getHtmlOptions('subscribers_at_once')); ?>
                                <?php echo $form->error($model, 'subscribers_at_once'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'change_server_at'); ?>
                                <?php echo $form->numberField($model, 'change_server_at', $model->fieldDecorator->getHtmlOptions('change_server_at')); ?>
                                <?php echo $form->error($model, 'change_server_at'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'max_bounce_rate'); ?>
                                <?php echo $form->numberField($model, 'max_bounce_rate', $model->fieldDecorator->getHtmlOptions('max_bounce_rate', [
                                'step' => '0.01',
                                'min'  => '-1',
                                'max'  => '100',
                            ])); ?>
                                <?php echo $form->error($model, 'max_bounce_rate'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'max_complaint_rate'); ?>
                                <?php echo $form->numberField($model, 'max_complaint_rate', $model->fieldDecorator->getHtmlOptions('max_complaint_rate', [
                                'step' => '0.01',
                                'min'  => '-1',
                                'max'  => '100',
                            ])); ?>
                                <?php echo $form->error($model, 'max_complaint_rate'); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo CHtml::link(IconHelper::make('info'), '#page-info-feedback-header', ['class' => 'btn btn-primary btn-xs btn-flat', 'title' => t('app', 'Info'), 'data-toggle' => 'modal']); ?>
                                <?php echo $form->labelEx($model, 'feedback_id_header_format'); ?>
                                <?php echo $form->textField($model, 'feedback_id_header_format', $model->fieldDecorator->getHtmlOptions('feedback_id_header_format')); ?>
                                <?php echo $form->error($model, 'feedback_id_header_format'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'list_unsubscribe_header_email'); ?>
                                <?php echo $form->textField($model, 'list_unsubscribe_header_email', $model->fieldDecorator->getHtmlOptions('list_unsubscribe_header_email')); ?>
                                <?php echo $form->error($model, 'list_unsubscribe_header_email'); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo CHtml::link(IconHelper::make('info'), '#page-info-email-header', ['class' => 'btn btn-primary btn-xs btn-flat', 'title' => t('app', 'Info'), 'data-toggle' => 'modal']); ?>
                                <?php echo $form->labelEx($model, 'email_header'); ?>
                                <?php echo $form->textArea($model, 'email_header', $model->fieldDecorator->getHtmlOptions('email_header')); ?>
                                <?php echo $form->error($model, 'email_header'); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo CHtml::link(IconHelper::make('info'), '#page-info-email-footer', ['class' => 'btn btn-primary btn-xs btn-flat', 'title' => t('app', 'Info'), 'data-toggle' => 'modal']); ?>
                                <?php echo $form->labelEx($model, 'email_footer'); ?>
                                <?php echo $form->textArea($model, 'email_footer', $model->fieldDecorator->getHtmlOptions('email_footer')); ?>
                                <?php echo $form->error($model, 'email_footer'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                /**
                 * This hook gives a chance to append content after the active form fields.
                 * Please note that from inside the action callback you can access all the controller view variables
                 * via {@CAttributeCollection $collection->controller->getData()}
                 * @since 1.3.4.3
                 */
                hooks()->doAction('after_active_form_fields', new CAttributeCollection([
                    'controller'    => $controller,
                    'form'          => $form,
                ])); ?>
                    <div class="clearfix"><!-- --></div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-flat"><?php echo IconHelper::make('save') . t('app', 'Save changes'); ?></button>
                    </div>
                    <div class="clearfix"><!-- --></div>
                </div>
            </div>
            <!-- modals -->
            <div class="modal modal-info fade" id="page-info-feedback-header" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo IconHelper::make('info') . t('app', 'Info'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php echo t('settings', 'Following placeholders are available:'); ?>
                            <div style="width:100%; max-height: 100px; overflow:scroll">
                                <?php echo implode('<br />', $model->getFeedbackIdFormatTagsInfoHtml()); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal modal-info fade" id="page-info-email-header" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo IconHelper::make('info') . t('app', 'Info'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php echo $model->fieldDecorator->getAttributeHelpText('email_header'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal modal-info fade" id="page-info-email-footer" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo IconHelper::make('info') . t('app', 'Info'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php echo $model->fieldDecorator->getAttributeHelpText('email_footer'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        $controller->endWidget();
    }
    /**
     * This hook gives a chance to append content after the active form.
     * Please note that from inside the action callback you can access all the controller view variables
     * via {@CAttributeCollection $collection->controller->getData()}
     * @since 1.3.4.3
     */
    hooks()->doAction('after_active_form', new CAttributeCollection([
        'controller'      => $controller,
        'renderedForm'    => $collection->itemAt('renderForm'),
    ])); ?>
    </div>
    <?php
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->getData()}
 * @since 1.3.4.3
 */
hooks()->doAction('after_view_file_content', new CAttributeCollection([
    'controller'        => $controller,
    'renderedContent'   => $viewCollection->itemAt('renderContent'),
]));
