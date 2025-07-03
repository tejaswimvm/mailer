<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * TransactionalEmailsController
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
 * @OA\PathItem(path="api/transactional-emails")
 */
class Transactional_emailsController
{
    /**
     * @OA\Get(
     *     path="/transactional-emails",
     *     tags={"transactional_emails"},
     *     operationId="viewTransactionalEmails",
     *     summary="View transactional emails",
     *     description="View transactional emails",
     *
     *     @OA\Response(
     *          response=200,
     *          description="Transactional email response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/TransactionalEmailResponseCollection")
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
     *     path="/transactional-emails/{email_uid}",
     *     tags={"transactional_emails"},
     *     operationId="viewTransactionalEmail",
     *     summary="View email",
     *     description="View email",
     *     @OA\Parameter(
     *         description="Unique id of the email",
     *         in="path",
     *         name="email_uid",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *           response=200,
     *           description="Transactional email response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/TransactionalEmailResponse")
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
     * @param string $email_uid
     */
    public function actionView($email_uid)
    {
    }

    /**
     * @OA\Post(
     *     path="/transactional-emails",
     *     tags={"transactional_emails"},
     *     operationId="createTransactionalEmail",
     *     summary="Create email",
     *     description="Create transactional email",
     *     @OA\RequestBody(
     *          required=true,
     *          description="Transactional email object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  ref="#/components/schemas/TransactionalEmailRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="Transactional email response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="email_uid",
     *                           type="string"
     *                       )
     *                )
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
    public function actionCreate()
    {
    }

    /**
     * @OA\Delete(
     *     path="/transactional-emails/{email_uid}",
     *     tags={"transactional_emails"},
     *     operationId="deleteTransactionalEmail",
     *     summary="Delete a email",
     *     description="Delete a email",
     *     @OA\Parameter(
     *          description="Unique id of the email",
     *          in="path",
     *          name="email_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="Delete email response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ApiResponse")
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
    public function actionDelete($email_uid)
    {
    }
}
