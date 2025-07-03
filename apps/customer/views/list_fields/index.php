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

/** @var string $fieldsHtml */
$fieldsHtml = (string)$controller->getData('fieldsHtml');

/** @var Lists $list */
$list = $controller->getData('list');

/** @var int $maxListFields */
$maxListFields = $controller->getData('maxListFields');

/** @var int $listFieldsCount */
$listFieldsCount = $controller->getData('listFieldsCount');

?>
    <div class="box box-primary borderless">
        <div class="box-header">
            <div class="pull-left">
                <?php $controller->widget('customer.components.web.widgets.MailListSubNavWidget', [
                    'list' => $list,
                ]); ?>
            </div>
        </div>
        <div class="box-body">
            <?php hooks()->doAction('customer_controller_list_fields_before_form'); ?>
            <?php echo CHtml::form(); ?>
            <div class="box box-primary borderless">
                <div class="box-header">
                    <h3 class="box-title"><?php echo IconHelper::make('glyphicon-tasks') . $pageHeading; ?></h3>
                </div>
                <div class="box-body">
                    <div class="list-fields">
                        <?php echo $fieldsHtml; ?>
                    </div>
                    <div class="clearfix"><!-- --></div>
                    <div class="list-fields-buttons" 
                         data-max-list-fields="<?php echo (int) $maxListFields; ?>"
                         data-list-fields-count="<?php echo (int) $listFieldsCount; ?>"
                         style="display: <?php echo $maxListFields > -1 && $listFieldsCount >= $maxListFields ? 'none' : 'block'; ?>"
                    >
                        <?php hooks()->doAction('customer_controller_list_fields_render_buttons'); ?>
                    </div>
                    <div class="clearfix"><!-- --></div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-flat"><?php echo IconHelper::make('save') . t('app', 'Save changes'); ?></button>
                    </div>
                    <div class="clearfix"><!-- --></div>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <?php hooks()->doAction('customer_controller_list_fields_after_form'); ?>
        </div>
    </div>
