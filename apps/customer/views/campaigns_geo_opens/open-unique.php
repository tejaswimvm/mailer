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
 * @since 1.4.5
 */

/** @var Controller $controller */
$controller = controller();

/** @var string $pageHeading */
$pageHeading = (string)$controller->getData('pageHeading');

/** @var CampaignTrackOpen $model */
$model = $controller->getData('model');

/** @var CActiveDataProvider $dataProvider */
$dataProvider = $controller->getData('dataProvider');

/** @var bool $canExportStats */
$canExportStats = (bool)$controller->getData('canExportStats');

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
                <?php BoxHeaderContent::make(BoxHeaderContent::LEFT)
                    ->add('<h3 class="box-title">' . IconHelper::make('glyphicon-list-alt') . html_encode((string)$pageHeading) . '</h3>')
                    ->render();
    ?>
            </div>
            <div class="pull-right">
                <?php BoxHeaderContent::make(BoxHeaderContent::RIGHT)
                    ->add($controller->widget('common.components.web.widgets.GridViewToggleColumns', ['model' => $model, 'columns' => ['campaign.name', 'subscriber.email', 'open_times', 'ip_address', 'user_agent', 'date_added']], true))
                    ->add(CHtml::link(IconHelper::make('view') . t('campaign_reports', 'View all opens'), ['campaigns_geo_opens/all'], ['class' => 'btn btn-primary btn-flat', 'title' => t('campaign_reports', 'View all opens')]))
                    ->addIf(CHtml::link(IconHelper::make('export') . t('campaign_reports', 'Export reports'), ['campaigns_geo_opens/export_unique'], ['target' => '_blank', 'class' => 'btn btn-primary btn-flat', 'title' => t('campaign_reports', 'Export reports')]), !empty($canExportStats))
                    ->render();
    ?>
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
            'dataProvider'      => $dataProvider,
            'filter'            => null,
            'filterPosition'    => 'body',
            'filterCssClass'    => 'grid-filter-cell',
            'itemsCssClass'     => 'table table-hover',
            'selectableRows'    => 0,
            'enableSorting'     => false,
            'cssFile'           => false,
            'pagerCssClass'     => 'pagination pull-right',
            'pager'             => [
                'class'         => 'CLinkPager',
                'cssFile'       => false,
                'header'        => false,
                'htmlOptions'   => ['class' => 'pagination'],
            ],
            'columns' => hooks()->applyFilters('grid_view_columns', [
                [
                    'name'  => 'campaign.name',
                    'value' => '$data->campaign->name',
                ],
                [
                    'name'  => 'subscriber.email',
                    'value' => '$data->subscriber->getDisplayEmail()',
                ],
                [
                    'name'  => 'open_times',
                    'value' => '$data->counter',
                ],
                [
                    'name'  => 'ip_address',
                    'value' => 'CHtml::link($data->getIpWithLocationForGrid(), CommonHelper::getIpAddressInfoUrl((string)$data->ip_address), array("target" => "_blank"))',
                    'type'  => 'raw',
                ],
                [
                    'name'  => 'user_agent',
                    'value' => 'CHtml::link($data->user_agent, CommonHelper::getUserAgentInfoUrl((string)$data->user_agent), array("target" => "_blank"))',
                    'type'  => 'raw',
                    'htmlOptions' => ['style' => 'max-width:220px;word-wrap:break-word;'],
                ],
                [
                    'name'  => 'date_added',
                    'value' => '$data->dateAdded',
                ],
                [
                    'class'     => 'DropDownButtonColumn',
                    'header'    => t('app', 'Options'),
                    'footer'    => $model->paginationOptions->getGridFooterPagination(),
                    'buttons'   => [
                        'update'    => [
                            'label'     => IconHelper::make('update'),
                            'url'       => 'createUrl("list_subscribers/update", array("list_uid" => $data->subscriber->list->list_uid, "subscriber_uid" => $data->subscriber->subscriber_uid))',
                            'imageUrl'  => null,
                            'options'   => ['title' => t('list_subscribers', 'Update subscriber'), 'class' => 'btn btn-primary btn-flat'],
                            'visible'   => 'apps()->isAppName("customer")',
                        ],
                    ],
                    'headerHtmlOptions' => ['style' => 'text-align: right'],
                    'footerHtmlOptions' => ['align' => 'right'],
                    'htmlOptions'       => ['align' => 'right', 'class' => 'options'],
                    'template'          => '{update}',
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
