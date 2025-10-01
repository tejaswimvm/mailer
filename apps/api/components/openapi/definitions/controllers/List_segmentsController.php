<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 *
 * List_segmentsController
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
 * @OA\PathItem(path="api/lists/{list_uid}/segments")
 */
class List_segmentsController
{
    /**
     * @OA\Get(
     *     path="/lists/{list_uid}/segments",
     *     tags={"list_segments"},
     *     operationId="viewListSegments",
     *     summary="View list segments",
     *     description="View list segments",
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
     *          description="List segments response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ListSegmentResponseCollection")
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
     *     path="/lists/{list_uid}/segments/{segment_uid}",
     *     tags={"list_segments"},
     *     operationId="viewListSegment",
     *     summary="View list segment",
     *     description="View list segment",
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
     *          description="Unique id of the segment",
     *          in="path",
     *          name="segment_uid",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List segments response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListSegmentResponse")
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
     * @param string $segment_uid
     */
    public function actionView($list_uid, $segment_uid)
    {
    }


    /**
     * @OA\Post(
     *     path="/lists/{list_uid}/segments",
     *     tags={"list_segments"},
     *     operationId="createListSegment",
     *     summary="Create a list segment",
     *     description="Create a list segment",
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
     *          description="List segment object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/ListSegmentRequest")
     *          )
     *      ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="List segment create response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="segment_uid",
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
     *     path="/lists/{list_uid}/segments/{segment_uid}",
     *     tags={"list_segments"},
     *     operationId="updateListSegment",
     *     summary="Update list segment",
     *     description="Update list segment",
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
     *           description="Unique id of the segment",
     *           in="path",
     *           name="segment_uid",
     *           required=true,
     *           @OA\Schema(
     *                type="string"
     *           )
     *       ),
     *
     *     @OA\RequestBody(
     *          required=true,
     *          description="List segment object",
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  ref="#/components/schemas/ListSegmentRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=200,
     *           description="List segments update response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="segment_uid",
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
     *
     * @param string $list_uid
     * @param string $segment_uid
     */
    public function actionUpdate($list_uid, $segment_uid)
    {
    }

    /**
     * @OA\Delete(
     *     path="/lists/{list_uid}/segments/{segment_uid}",
     *     tags={"list_segments"},
     *     operationId="deleteListSegment",
     *     summary="Delete a list segment",
     *     description="Delete a list segment",
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
     *           description="Unique id of the segment",
     *           in="path",
     *           name="segment_uid",
     *           required=true,
     *            @OA\Schema(
     *                type="string"
     *            )
     *       ),
     *     @OA\Response(
     *           response=200,
     *           description="Delete segment response",
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
     * @param string $segment_uid
     */
    public function actionDelete($list_uid, $segment_uid)
    {
    }

    /**
     * @OA\Get(
     *     path="lists/segments/condition-operators",
     *     tags={"list_segments"},
     *     operationId="listSegmentsOperators",
     *     summary="Get the list segments conditions operators",
     *     description="Get the list segments conditions operators",
     *
     *     @OA\Response(
     *           response=200,
     *           description="List segments conditions operators response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListSegmentConditionOperatorResponseCollection")
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
    public function actionCondition_operators()
    {
    }
}
