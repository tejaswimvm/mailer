<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Campaign_bouncesController
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 2.4.5
 */

/**
 * @OA\PathItem(path="api/campaign/{campaign_uid}/bounces")
 */
class Campaign_bouncesController
{
    /**
     * @OA\Get(
     *     path="/campaigns/{campaign_uid}/bounces",
     *     tags={"campaign_bounces"},
     *     operationId="viewCampaignBounces",
     *     summary="View campaign bounces",
     *     description="View campaign bounces",
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
     *          description="Campaign bounces response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/CampaignBounceResponseCollection")
     *           ),
     *      ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *         ),
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *          ),
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Object not found",
     *          @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *          ),
     *     ),
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
     * @OA\Post(
     *     path="/campaigns/{campaign_uid}/bounces",
     *     tags={"campaign_bounces"},
     *     operationId="createCampaignBounce",
     *     summary="Create campaign bounces",
     *     description="Create campaign bounces",
     *     @OA\Parameter(
     *         description="Unique id of the campaign",
     *         in="path",
     *         name="campaign_uid",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="Bounce object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/CampaignBounceRequest")
     *          )
     *     ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="Campaign bounce response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/CampaignBounceResponse")
     *            )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *          ),
     *      ),
     *      @OA\Response(
     *           response=401,
     *           description="Unauthorized",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *           ),
     *      ),
     *      @OA\Response(
     *           response=404,
     *           description="Object not found",
     *           @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *           ),
     *      ),
     *     security={
     *       {"apiKey": {}}
     *     }
     * )
     *
     * @param string $campaign_uid
     */
    public function actionCreate($campaign_uid)
    {
    }
}
