<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 *
 * List_fieldsController
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
 * @OA\PathItem(path="api/lists/{list_uid}/fields")
 */
class List_fieldsController
{
    /**
     * @OA\Get(
     *     path="/lists/{list_uid}/fields",
     *     tags={"list_fields"},
     *     operationId="viewListFields",
     *     summary="View list fields",
     *     description="View list fields",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="List fields response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ListFieldResponseCollection")
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
     *     path="/lists/{list_uid}/fields/{field_id}",
     *     tags={"list_fields"},
     *     operationId="viewListField",
     *     summary="View list field",
     *     description="View list field",
     *     @OA\Parameter(
     *         description="Unique id of the list",
     *         in="path",
     *         name="list_uid",
     *         required=true,
     *         @OA\Schema(
     *              type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *          description="Unique id of the field",
     *          in="path",
     *          name="field_id",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List fields response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListFieldResponse")
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
     * @param string $list_uid
     * @param int $field_id
     */
    public function actionView($list_uid, $field_id)
    {
    }


    /**
     * @OA\Post(
     *     path="/lists/{list_uid}/fields",
     *     tags={"list_fields"},
     *     operationId="createListField",
     *     summary="Create a list field",
     *     description="Create a list field",
     *     @OA\Parameter(
     *           description="Unique id of the list",
     *           in="path",
     *           name="list_uid",
     *           required=true,
     *           @OA\Schema(
     *                type="string"
     *           )
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="List field object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/ListFieldRequest")
     *          )
     *      ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="List field create response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListField")
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
     *     path="/lists/{list_uid}/fields/{field_id}",
     *     tags={"list_fields"},
     *     operationId="updateListField",
     *     summary="Update list field",
     *     description="Update list field",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *           description="Unique id of the field",
     *           in="path",
     *           name="field_id",
     *           required=true,
     *           @OA\Schema(
     *                type="integer"
     *           )
     *       ),
     *
     *     @OA\RequestBody(
     *          required=true,
     *          description="List field object",
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  ref="#/components/schemas/ListFieldRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=200,
     *           description="List fields update response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListField")
     *           )
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
     * @param string $list_uid
     * @param string $field_id
     */
    public function actionUpdate($list_uid, $field_id)
    {
    }

    /**
     * @OA\Delete(
     *     path="/lists/{list_uid}/fields/{field_id}",
     *     tags={"list_fields"},
     *     operationId="deleteListField",
     *     summary="Delete a list field",
     *     description="Delete a list field",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *           description="Unique id of the field",
     *           in="path",
     *           name="field_id",
     *           required=true,
     *            @OA\Schema(
     *                type="string"
     *            )
     *       ),
     *     @OA\Response(
     *           response=200,
     *           description="Delete field response",
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
     * @param string $list_uid
     * @param int $field_id
     */
    public function actionDelete($list_uid, $field_id)
    {
    }

    /**
     * @OA\Get(
     *     path="lists/fields/types",
     *     tags={"list_fields"},
     *     operationId="listFieldsTypes",
     *     summary="Get the list fields types",
     *     description="Get the list fields types",
     *
     *     @OA\Response(
     *           response=200,
     *           description="List fields types response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListFieldTypeResponseCollection")
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
    public function actionList_field_types()
    {
    }
}
