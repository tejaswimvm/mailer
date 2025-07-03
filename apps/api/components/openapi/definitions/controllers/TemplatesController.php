<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * TemplatesController
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
 * @OA\PathItem(path="api/templates")
 */
class TemplatesController
{
    /**
     * @OA\Get(
     *     path="/templates",
     *     tags={"templates"},
     *     operationId="viewTemplates",
     *     summary="View templates",
     *     description="View templates",
     *
     *     @OA\Response(
     *          response=200,
     *          description="Template response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/TemplateResponseCollection")
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
     *     path="/templates/{template_uid}",
     *     tags={"templates"},
     *     operationId="viewTemplate",
     *     summary="View template",
     *     description="View template",
     *     @OA\Parameter(
     *         description="Unique id of the template",
     *         in="path",
     *         name="template_uid",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *           response=200,
     *           description="Template response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/TemplateResponse")
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
     * @param string $template_uid
     */
    public function actionView($template_uid)
    {
    }

    /**
     * @OA\Post(
     *     path="/templates",
     *     tags={"templates"},
     *     operationId="createTemplate",
     *     summary="Create template",
     *     description="Create template",
     *     @OA\RequestBody(
     *          required=true,
     *          description="Template object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  ref="#/components/schemas/TemplateRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="Template response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="template_uid",
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
     * @OA\Put(
     *     path="/templates/{template_uid}",
     *     tags={"templates"},
     *     operationId="updateTemplate",
     *     summary="Update template",
     *     description="Update template",
     *     @OA\Parameter(
     *          description="Unique id of the template",
     *          in="path",
     *          name="template_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="Template object",
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  ref="#/components/schemas/TemplateRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=200,
     *           description="Template update response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
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
    public function actionUpdate($template_uid)
    {
    }

    /**
     * @OA\Delete(
     *     path="/templates/{template_uid}",
     *     tags={"templates"},
     *     operationId="deleteTemplate",
     *     summary="Delete a template",
     *     description="Delete a template",
     *     @OA\Parameter(
     *          description="Unique id of the template",
     *          in="path",
     *          name="template_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="Delete template response",
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
    public function actionDelete($template_uid)
    {
    }
}
