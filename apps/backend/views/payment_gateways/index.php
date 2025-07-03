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
 * @since 1.2
 */

/** @var Controller $controller */
$controller = controller();

/** @var string $pageHeading */
$pageHeading = (string)$controller->getData('pageHeading');

/** @var PaymentGatewaysList $model */
$model = $controller->getData('model');
/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->getData()}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->add('renderContent', false)}
 * in order to stop rendering the default content.
 * @since 1.3.3.1
 */
hooks()->doAction('before_view_file_content', $viewCollection = new CAttributeCollection([
    'controller'    => $controller,
    'renderContent' => true,
]));

// and render if allowed
if ($viewCollection->itemAt('renderContent')) { ?>
    <div class="box box-primary borderless">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title">
                    <?php echo IconHelper::make('glyphicon-transfer') . html_encode((string)$pageHeading); ?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo HtmlHelper::accessLink(IconHelper::make('refresh') . t('app', 'Refresh'), ['payment_gateways/index'], ['class' => 'btn btn-primary btn-flat', 'title' => t('app', 'Refresh')]); ?>
                <?php echo CHtml::link(IconHelper::make('info'), '#page-info', ['class' => 'btn btn-primary btn-flat', 'title' => t('app', 'Info'), 'data-toggle' => 'modal']); ?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <?php
            /**
             * This hook gives a chance to prepend content or to replace the default grid view content with a custom content.
             * Please note that from inside the action callback you can access all the controller view
             * variables via {@CAttributeCollection $collection->controller->getData()}
             * In case the content is replaced, make sure to set {@CAttributeCollection $collection->itemAt('renderGrid')} to false
             * in order to stop rendering the default content.
             * @since 1.3.3.1
             */
            hooks()->doAction('before_grid_view', $collection = new CAttributeCollection([
                'controller'    => $controller,
                'renderGrid'    => true,
            ]));

    // and render if allowed
    if ($collection->itemAt('renderGrid')) {
        $controller->widget('zii.widgets.grid.CGridView', hooks()->applyFilters('grid_view_properties', [
            'ajaxUrl'           => createUrl($controller->getRoute()),
            'id'                => $model->getModelName() . '-grid',
            'dataProvider'      => $model->getDataProvider(),
            'filter'            => null,
            'filterPosition'    => 'body',
            'filterCssClass'    => 'grid-filter-cell',
            'itemsCssClass'     => 'table table-hover',
            'selectableRows'    => 0,
            'enableSorting'     => false,
            'cssFile'           => false,
            'pager'             => false,
            'columns' => hooks()->applyFilters('grid_view_columns', [
                [
                    'name'  => t('payment_gateways', 'Name'),
                    'value' => '$data["name"]',
                    'type'  => 'raw',
                ],
                [
                    'name'  => t('payment_gateways', 'Description'),
                    'value' => '$data["description"]',
                ],
                [
                    'name'  => t('payment_gateways', 'Status'),
                    'value' => '$data["status"]',
                ],
                [
                    'name'  => t('payment_gateways', 'Sort order'),
                    'value' => '$data["sort_order"]',
                ],
                [
                    'class'     => 'DropDownButtonColumn',
                    'header'    => t('app', 'Options'),
                    'buttons'   => [
                        'page' => [
                            'label'     => IconHelper::make('view'),
                            'url'       => '$data["page_url"]',
                            'imageUrl'  => null,
                            'options'   => ['title' => t('payment_gateways', 'Gateway detail page'), 'class'=>'btn btn-primary btn-flat btn-flat'],
                            'visible'   => '!empty($data["page_url"])',
                        ],
                    ],
                    'headerHtmlOptions' => ['style' => 'text-align: right'],
                    'footerHtmlOptions' => ['align' => 'right'],
                    'htmlOptions'       => ['align' => 'right', 'class' => 'options'],
                    'template'          => '{page}',
                ],
            ], $controller),
        ], $controller));
    }
    /**
     * This hook gives a chance to append content after the grid view content.
     * Please note that from inside the action callback you can access all the controller view
     * variables via {@CAttributeCollection $collection->controller->getData()}
     * @since 1.3.3.1
     */
    hooks()->doAction('after_grid_view', new CAttributeCollection([
        'controller'    => $controller,
        'renderedGrid'  => $collection->itemAt('renderGrid'),
    ]));
    ?>
            <div class="clearfix"><!-- --></div>
            </div>
        </div>
    </div>
    <!-- modals -->
    <div class="modal modal-info fade" id="page-info" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo IconHelper::make('info') . t('app', 'Info'); ?></h4>
                </div>
                <div class="modal-body">
                    <?php echo t('payment_gateways', 'The payment gateways are implemented as extensions, you\'ll want to enable them from the extensions area first and then manage them from here.'); ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->getData()}
 * @since 1.3.3.1
 */
hooks()->doAction('after_view_file_content', new CAttributeCollection([
    'controller'        => $controller,
    'renderedContent'   => $viewCollection->itemAt('renderContent'),
]));
