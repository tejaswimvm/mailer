<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Campaigns_trackingController
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
 * @OA\PathItem(path="api/campaign/{campaign_uid}/tracking")
 */
class Campaigns_trackingController
{
    /**
     * @OA\Get(
     *     path="/campaigns/{campaign_uid}/track-url/{subscriber_uid}/{hash}",
     *     tags={"campaigns_tracking"},
     *     operationId="viewCampaignTrackUrl",
     *     summary="View campaign track url",
     *     description="View campaign track url",
     *     @OA\Parameter(
     *          description="Unique id of the campaign",
     *          in="path",
     *          name="campaign_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *          description="Unique id of the subscriber",
     *          in="path",
     *          name="subscriber_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *           description="Url hash",
     *           in="path",
     *           name="hash",
     *           required=true,
     *            @OA\Schema(
     *                type="string"
     *            )
     *       ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Campaign track url response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/CampaignsTrackUrlResponse")
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
     * @param $campaign_uid
     * @param $subscriber_uid
     * @param $hash
     */
    public function actionTrack_url($campaign_uid, $subscriber_uid, $hash)
    {
    }

    /**
     * @OA\Get(
     *     path="/campaigns/{campaign_uid}/track-opening/{subscriber_uid}",
     *     tags={"campaigns_tracking"},
     *     operationId="recordCampaignTrackOpening",
     *     summary="Record campaign track opening",
     *     description="Record campaign track opening",
     *     @OA\Parameter(
     *          description="Unique id of the campaign",
     *          in="path",
     *          name="campaign_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *          description="Unique id of the subscriber",
     *          in="path",
     *          name="subscriber_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Campaign track opening action response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ApiResponse")
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
     * @param $campaign_uid
     * @param $subscriber_uid
     */
    public function actionTrack_opening($campaign_uid, $subscriber_uid)
    {
    }

    /**
     * @OA\Post(
     *     path="/campaigns/{campaign_uid}/track-unsubscribe/{subscriber_uid}",
     *     tags={"campaigns_tracking"},
     *     operationId="recordCampaignTrackUnsubscribe",
     *     summary="Record campaign track unsubscribe",
     *     description="Record campaign track unsubscribe",
     *     @OA\Parameter(
     *          description="Unique id of the campaign",
     *          in="path",
     *          name="campaign_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *          description="Unique id of the subscriber",
     *          in="path",
     *          name="subscriber_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="Campaign track unsubscribe action response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ApiResponse")
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
     * @param $campaign_uid
     * @param $subscriber_uid
     */
    public function actionTrack_unsubscribe($campaign_uid, $subscriber_uid)
    {
    }
}
