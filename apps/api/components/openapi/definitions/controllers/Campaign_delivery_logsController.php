<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Campaign_delivery_logsController
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
 * @OA\PathItem(path="api/campaign/{campaign_uid}/delivery-logs")
 */
class Campaign_delivery_logsController
{
    /**
     * @OA\Get(
     *     path="/campaigns/{campaign_uid}/delivery-logs",
     *     tags={"campaign_delivery_logs"},
     *     operationId="viewCampaignDeliveryLogs",
     *     summary="View campaign delivery logs",
     *     description="View campaign delivery logs",
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
     *          description="Campaign delivery logs response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/CampaignDeliveryLogResponseCollection")
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


    /**
     * @OA\Get(
     *     path="/campaigns/email-message-id/{email_message_id}",
     *     tags={"campaign_delivery_logs"},
     *     operationId="viewCampaignEmailMessage",
     *     summary="View campaign email message",
     *     description="View campaign email message",
     *     @OA\Parameter(
     *         description="Unique id of the email message",
     *         in="path",
     *         name="email_message_id",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Email message response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/CampaignDeliveryLogResponse")
     *           )
     *      ),
     *      @OA\Response(
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
     * @param $email_message_id
     */
    public function actionEmail_message_id($email_message_id)
    {
    }
}
