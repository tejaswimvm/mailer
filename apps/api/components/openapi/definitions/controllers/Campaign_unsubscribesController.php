<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Campaign_unsubscribesController
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 2.4.5
 */

/**
 *
 * @OA\PathItem(path="api/campaign/{campaign_uid}/unsubscribes")
 */
class Campaign_unsubscribesController
{
    /**
     * @OA\Get(
     *     path="/campaigns/{campaign_uid}/unsubscribes",
     *     tags={"campaign_unsubscribes"},
     *     operationId="viewCampaignUnsubscribes",
     *     summary="View campaign unsubscribes",
     *     description="View campaign unsubscribes",
     *     @OA\Parameter(
     *         description="Unique id of the campaign",
     *         in="path",
     *         name="campaign_uid",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Campaign unsubscribes response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/CampaignUnsubscribeResponseCollection")
     *           )
     *     ),
     *     @OA\Response(
     *          response=400,
     *          description="Bad request",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *          )
     *      ),
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *           )
     *      ),
     *      @OA\Response(
     *           response=404,
     *           description="Object not found",
     *           @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *           )
     *      ),
     *     security={
     *       {"apiKey": {}}
     *     }
     * )
     *
     * @param $campaign_uid
     */
    public function actionIndex($campaign_uid)
    {
    }
}
