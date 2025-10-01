<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * CustomersController
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
 * @OA\PathItem(path="api/customers")
 */
class CustomersController
{
    /**
     * @OA\Post(
     *     path="/customers",
     *     tags={"customers"},
     *     operationId="createCustomers",
     *     summary="Create customers",
     *     description="Create customers",
     *     @OA\RequestBody(
     *          required=true,
     *          description="Customer object",
     *          @OA\MediaType(
     *               mediaType="multipart/form-data",
     *               @OA\Schema(
     *                   ref="#/components/schemas/CustomerRequest"
     *               )
     *            )
     *       ),
     *     @OA\Response(
     *          response=201,
     *          description="Customer response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(
     *                       @OA\Property(
     *                           property="status",
     *                           type="string"
     *                       ),
     *                       @OA\Property(
     *                            property="customer_uid",
     *                            type="string"
     *                        ),
     *                       @OA\Property(
     *                            property="must_confirm_email",
     *                            type="boolean"
     *                       ),
     *                       @OA\Property(
     *                             property="require_approval",
     *                             type="boolean"
     *                        ),
     *                       @OA\Property(
     *                              property="list_subscribe_result",
     *                              type="object",
     *                              @OA\Property(
     *                                  property="status",
     *                                  type="string"
     *                              ),
     *                              @OA\Property(
     *                                  property="message",
     *                                  type="string"
     *                              ),
     *                       ),
     *                 )
     *           )
     *      ),
     *     @OA\Response(
     *           response=422,
     *           description="Unprocessable request",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ApiResponseError")
     *           )
     *       ),
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
    public function actionCreate()
    {
    }
}
