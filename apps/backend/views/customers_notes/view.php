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
 * @since 2.1.8
 */

/** @var Controller $controller */
$controller = controller();

/** @var string $pageHeading */
$pageHeading = (string)$controller->getData('pageHeading');

/** @var CustomerNote $note */
$note = $controller->getData('note');

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
                    ->add('<h3 class="box-title">' . IconHelper::make('fa-pencil') . $pageHeading . '</h3>')
                    ->render();
    ?>
            </div>
            <div class="pull-right">
                <?php BoxHeaderContent::make(BoxHeaderContent::RIGHT)
                    ->add(HtmlHelper::accessLink(IconHelper::make('back') . t('app', 'Back to all notes'), ['customer_notes/index'], ['class' => 'btn btn-primary btn-flat', 'title' => t('app', 'Back')]))
                    ->add(HtmlHelper::accessLink(IconHelper::make('back') . t('app', 'Back to customer notes'), ['customer_notes/index', 'customer_uid' => $note->customer->customer_uid], ['class' => 'btn btn-primary btn-flat', 'title' => t('app', 'Back')]))
                    ->render();
    ?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <?php
    $controller->widget('zii.widgets.CDetailView', [
        'data'      => $note,
        'cssFile'   => false,
        'htmlOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed',
        ],
        'attributes' => [
            [
                'label' => $note->getAttributeLabel('user_id'),
                'value' => $note->user->getFullName(),
            ],
            [
                'label' => $note->getAttributeLabel('customer_id'),
                'value' => $note->customer->getFullName(),
            ],
            [
                'label' => $note->getAttributeLabel('title'),
                'value' => $note->title,
            ],
            [
                'label' => $note->getAttributeLabel('note'),
                'value' => nl2br($note->note),
                'type'  => 'raw',
            ],
            [
                'label' => $note->getAttributeLabel('date_added'),
                'value' => $note->dateTimeFormatter->getDateAdded(),
            ],
        ],
    ]);
    ?>
            </div>
        </div>
        <div class="clearfix"><!-- --></div>
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
