<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * CountriesController
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
 * @OA\PathItem(path="api/countries")
 */
class CountriesController
{
    /**
     * @OA\Get(
     *     path="/countries",
     *     tags={"countries"},
     *     operationId="viewCountries",
     *     summary="View countries",
     *     description="View countries",
     *
     *     @OA\Response(
     *          response=200,
     *          description="Countries response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/CountryResponseCollection")
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
     */
    public function actionIndex()
    {
    }

    /**
     * @OA\Get(
     *     path="/countries/{country_id}/zones",
     *     tags={"countries"},
     *     operationId="countryZones",
     *     summary="Get a country zones",
     *     description="Get a country zones",
     *     @OA\Parameter(
     *          description="Unique id of the country",
     *          in="path",
     *          name="country_id",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="Country zones response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ZoneResponseCollection")
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
     */
    public function actionZones($country_id)
    {
    }
}
