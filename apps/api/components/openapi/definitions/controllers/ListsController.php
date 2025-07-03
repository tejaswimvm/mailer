<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * ListsController
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
 * @OA\PathItem(path="api/lists")
 */
class ListsController
{
    /**
     * @OA\Get(
     *     path="/lists",
     *     tags={"lists"},
     *     operationId="viewLists",
     *     summary="View lists",
     *     description="View lists",
     *
     *     @OA\Response(
     *          response=200,
     *          description="Lists response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ListsResponseCollection")
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
     *     path="/lists/{list_uid}",
     *     tags={"lists"},
     *     operationId="viewList",
     *     summary="View list",
     *     description="View list",
     *     @OA\Parameter(
     *         description="Unique id of the list",
     *         in="path",
     *         name="list_uid",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *           response=200,
     *           description="List response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListsResponse")
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
     */
    public function actionView($list_uid)
    {
    }


    /**
     * @OA\Post(
     *     path="/lists",
     *     tags={"lists"},
     *     operationId="createList",
     *     summary="Create list",
     *     description="Create list",
     *     @OA\RequestBody(
     *          required=true,
     *          description="List object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  ref="#/components/schemas/ListsRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="List response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="list_uid",
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
     *     path="/lists/{list_uid}",
     *     tags={"lists"},
     *     operationId="updateList",
     *     summary="Update list",
     *     description="Update list",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="List object",
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  ref="#/components/schemas/ListsUpdateRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=200,
     *           description="List update response",
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
    public function actionUpdate($list_uid)
    {
    }

    /**
     * @OA\Post(
     *     path="/lists/{list_uid}/copy",
     *     tags={"lists"},
     *     operationId="copyList",
     *     summary="Copy list",
     *     description="Copy list",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List copy response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="list_uid",
     *                           type="string"
     *                      )
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
    public function actionCopy($list_uid)
    {
    }

    /**
     * @OA\Delete(
     *     path="/lists/{list_uid}",
     *     tags={"lists"},
     *     operationId="deleteList",
     *     summary="Delete a list",
     *     description="Delete a list",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *           @OA\Schema(
     *               type="string"
     *           )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="Delete list response",
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
    public function actionDelete($list_uid)
    {
    }
}
