<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * DocsController
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 2.4.5
 */
class DocsController extends Controller
{
    /**
     * @return array
     */
    public function accessRules()
    {
        return [
            // allow all users on all actions
            ['allow'],
        ];
    }

    /**
     * @return void
     */
    public function actionIndex()
    {
        $this->render('index', [
            'restUrl' => createUrl('docs/json-schema'),
            'common'  => container()->get(OptionCommon::class),
        ]);
    }

    /**
     * @return void
     * @throws CException
     */
    public function actionJson_schema()
    {
        $json = (array) json_decode(
            (string)file_get_contents((string)Yii::getPathOfAlias('api.components.openapi.data.schema') . '.json'),
            true
        );

        /** @var OptionUrl $urlOption */
        $urlOption = container()->get(OptionUrl::class);

        /** @var OptionCommon $commonOptions */
        $commonOptions = container()->get(OptionCommon::class);

        $json['info']['title']       = $commonOptions->getSiteName(); // @phpstan-ignore-line
        $json['info']['description'] = $commonOptions->getSiteDescription(); // @phpstan-ignore-line

        $json['servers'] = [
            [
                'url' => [
                    $urlOption->getApiUrl(),
                ],
                'description' => [
                    $commonOptions->getSiteDescription(),
                ],
            ],
        ];

        $this->renderJson($json);
    }
}
