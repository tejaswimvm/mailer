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
 * @since 1.3.4.7
 */

/** @var Controller $controller */
$controller = controller();

/** @var string $pageHeading */
$pageHeading = (string)$controller->getData('pageHeading');

/** @var CompanyType $type */
$type = $controller->getData('type');

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
                    ->add('<h3 class="box-title">' . IconHelper::make('glyphicon-book') . html_encode((string)$pageHeading) . '</h3>')
                    ->render();
    ?>
            </div>
            <div class="pull-right">
                <?php BoxHeaderContent::make(BoxHeaderContent::RIGHT)
                    ->add($controller->widget('common.components.web.widgets.GridViewToggleColumns', ['model' => $type, 'columns' => ['name', 'date_added', 'last_updated']], true))
                    ->add(HtmlHelper::accessLink(IconHelper::make('create') . t('app', 'Create new'), ['company_types/create'], ['class' => 'btn btn-primary btn-flat', 'title' => t('app', 'Create new')]))
                    ->add(HtmlHelper::accessLink(IconHelper::make('refresh') . t('app', 'Refresh'), ['company_types/index'], ['class' => 'btn btn-primary btn-flat', 'title' => t('app', 'Refresh')]))
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
            'id'                => $type->getModelName() . '-grid',
            'dataProvider'      => $type->search(),
            'filter'            => $type,
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
                    'name'  => 'name',
                    'value' => '$data->name',
                ],
                [
                    'name'      => 'date_added',
                    'value'     => '$data->dateAdded',
                    'filter'    => false,
                ],
                [
                    'name'      => 'last_updated',
                    'value'     => '$data->lastUpdated',
                    'filter'    => false,
                ],
                [
                    'class'     => 'DropDownButtonColumn',
                    'header'    => t('app', 'Options'),
                    'footer'    => $type->paginationOptions->getGridFooterPagination(),
                    'buttons'   => [
                        'update' => [
                            'label'     => IconHelper::make('update'),
                            'url'       => 'createUrl("company_types/update", array("id" => $data->type_id))',
                            'imageUrl'  => null,
                            'options'   => ['title' => t('app', 'Update'), 'class' => 'btn btn-primary btn-flat'],
                            'visible'   => 'AccessHelper::hasRouteAccess("company_types/update")',
                        ],
                        'delete' => [
                            'label'     => IconHelper::make('delete'),
                            'url'       => 'createUrl("company_types/delete", array("id" => $data->type_id))',
                            'imageUrl'  => null,
                            'options'   => ['title' => t('app', 'Delete'), 'class' => 'btn btn-danger btn-flat delete'],
                            'visible'   => 'AccessHelper::hasRouteAccess("company_types/delete")',
                        ],
                    ],
                    'headerHtmlOptions' => ['style' => 'text-align: right'],
                    'footerHtmlOptions' => ['align' => 'right'],
                    'htmlOptions'       => ['align' => 'right', 'class' => 'options'],
                    'template'          => '{update} {delete}',
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
