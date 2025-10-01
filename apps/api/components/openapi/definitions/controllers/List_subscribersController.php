<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 *
 * List_subscribersController
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
 * @OA\PathItem(path="api/lists/{list_uid}/subscribers")
 */
class List_subscribersController
{
    /**
     * @OA\Get(
     *     path="/lists/{list_uid}/subscribers",
     *     tags={"list_subscribers"},
     *     operationId="viewListSubscribers",
     *     summary="View list subscribers",
     *     description="View list subscribers",
     *     @OA\Parameter(
     *          description="Unique id of the list",
     *          in="path",
     *          name="list_uid",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *           description="Status of the subscriber",
     *           in="query",
     *           name="status",
     *           required=false,
     *           @OA\Schema(
     *               type="string",
     *               enum={"unconfirmed", "confirmed", "blacklisted", "unsubscribed", "unapproved", "disabled", "moved"},
     *           )
     *       ),
     *     @OA\Response(
     *          response=200,
     *          description="List subscribers response",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/ListSubscriberResponseCollection")
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
     *     path="/lists/{list_uid}/subscribers/{subscriber_uid}",
     *     tags={"list_subscribers"},
     *     operationId="viewListSubscriber",
     *     summary="View list subscriber",
     *     description="View list subscriber",
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
     *          description="Unique id of the subscriber",
     *          in="path",
     *          name="subscriber_uid",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List subscribers response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListSubscriberResponse")
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
     * @param string $subscriber_uid
     */
    public function actionView($list_uid, $subscriber_uid)
    {
    }


    /**
     * @OA\Post(
     *     path="/lists/{list_uid}/subscribers",
     *     tags={"list_subscribers"},
     *     operationId="createListSubscriber",
     *     summary="Create a list subscriber",
     *     description="Create a list subscriber",
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
     *          description="List subscriber object",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/ListSubscriberRequest")
     *          )
     *      ),
     *
     *     @OA\Response(
     *           response=201,
     *           description="List subscriber create response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                      @OA\Property(
     *                          property="status",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                           property="subscriber_uid",
     *                           type="string"
     *                       ),
     *                      @OA\Property(
     *                            property="email",
     *                            type="string"
     *                      ),
     *                      @OA\Property(
     *                             property="ip_address",
     *                             type="string"
     *                       ),
     *                      @OA\Property(
     *                              property="source",
     *                              type="string"
     *                      ),
     *                      @OA\Property(
     *                              property="date_added",
     *                              type="string"
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
    public function actionCreate()
    {
    }

    /**
     * @OA\Put(
     *     path="/lists/{list_uid}/subscribers/{subscriber_uid}",
     *     tags={"list_subscribers"},
     *     operationId="updateListSubscriber",
     *     summary="Update list subscriber",
     *     description="Update list subscriber",
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
     *           description="Unique id of the subscriber",
     *           in="path",
     *           name="subscriber_uid",
     *           required=true,
     *           @OA\Schema(
     *                type="string"
     *           )
     *       ),
     *
     *     @OA\RequestBody(
     *          required=true,
     *          description="List subscriber object",
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  ref="#/components/schemas/ListSubscriberRequest"
     *              )
     *           )
     *      ),
     *
     *     @OA\Response(
     *           response=200,
     *           description="List subscribers update response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                       @OA\Property(
     *                           property="status",
     *                           type="string"
     *                       ),
     *                       @OA\Property(
     *                            property="subscriber_uid",
     *                            type="string"
     *                        ),
     *                       @OA\Property(
     *                             property="email",
     *                             type="string"
     *                       ),
     *                       @OA\Property(
     *                              property="ip_address",
     *                              type="string"
     *                        ),
     *                       @OA\Property(
     *                               property="source",
     *                               type="string"
     *                       ),
     *                       @OA\Property(
     *                               property="date_added",
     *                               type="string"
     *                       )
     *                 )
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
     * @param string $subscriber_uid
     */
    public function actionUpdate($list_uid, $subscriber_uid)
    {
    }

    /**
     * @OA\Delete(
     *     path="/lists/{list_uid}/subscribers/{subscriber_uid}",
     *     tags={"list_subscribers"},
     *     operationId="deleteListSubscriber",
     *     summary="Delete a list subscriber",
     *     description="Delete a list subscriber",
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
     *           description="Unique id of the subscriber",
     *           in="path",
     *           name="subscriber_uid",
     *           required=true,
     *            @OA\Schema(
     *                type="string"
     *            )
     *       ),
     *     @OA\Response(
     *           response=200,
     *           description="Delete subscriber response",
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
     * @param string $subscriber_uid
     */
    public function actionDelete($list_uid, $subscriber_uid)
    {
    }

    /**
     * @OA\Get(
     *     path="/lists/{list_uid}/subscribers/search-by-email",
     *     tags={"list_subscribers"},
     *     operationId="searchByEmailListSubscriber",
     *     summary="Search by email",
     *     description="Search by email",
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
     *          description="Email of the subscriber",
     *          in="query",
     *          name="EMAIL",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List subscribers response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(
     *                        @OA\Property(
     *                            property="status",
     *                            type="string"
     *                        ),
     *                        @OA\Property(
     *                            property="data",
     *                            type="object",
     *                            @OA\Property(
     *                                   property="subscriber_uid",
     *                                   type="string"
     *                            ),
     *                            @OA\Property(
     *                                   property="status",
     *                                   type="string"
     *                            ),
     *                            @OA\Property(
     *                                   property="date_added",
     *                                   type="string"
     *                            )
     *                        )
     *                  )
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
    public function actionSearch_by_email($list_uid)
    {
    }

    /**
     * @OA\Get(
     *     path="/lists/subscribers/search-by-email-in-all-lists",
     *     tags={"list_subscribers"},
     *     operationId="searchByEmailInAllLists",
     *     summary="Search by email in all lists",
     *     description="Search by email in all lists",
     *     @OA\Parameter(
     *          description="Email of the subscriber",
     *          in="query",
     *          name="EMAIL",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List subscribers response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListSubscriberWithListResponseCollection")
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
     */
    public function actionSearch_by_email_in_all_lists()
    {
    }

    /**
     * @OA\Get(
     *     path="/lists/{list_uid}/subscribers/search-by-custom-fields",
     *     tags={"list_subscribers"},
     *     operationId="searchByCustomFieldsListSubscriber",
     *     summary="Search by custom fields",
     *     description="Search by custom fields",
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
     *          name="custom_fields",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="object",
     *              additionalProperties={
     *                  "type": "string"
     *              },
     *              example={
     *                  "EMAIL": "john@doe.com",
     *                  "FNAME": "John",
     *                  "LNAME": "Doe"
     *              }
     *          ),
     *          description="Custom fields"
     *      ),
     *     @OA\Response(
     *           response=200,
     *           description="List subscribers response",
     *           @OA\MediaType(
     *                mediaType="application/json",
     *                @OA\Schema(ref="#/components/schemas/ListSubscriberResponseCollection")
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
    public function actionSearch_by_custom_fields($list_uid)
    {
    }

    /**
     * @OA\Put(
     *     path="/lists/{list_uid}/subscribers/{subscriber_uid}/unsubscribe",
     *     tags={"list_subscribers"},
     *     operationId="unsubscribeListSubscriber",
     *     summary="Unsubscribe list subscriber",
     *     description="Unsubscribe list subscriber",
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
     *          description="Unique id of the subscriber",
     *          in="path",
     *          name="subscriber_uid",
     *          required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),
     *     @OA\Response(
     *           response=200,
     *            description="Unsubscribe subscriber response",
     *            @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/ApiResponse")
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
     * @param string $subscriber_uid
     */
    public function actionUnsubscribe($list_uid, $subscriber_uid)
    {
    }

    /**
     * @OA\Put(
     *     path="/lists/subscribers/unsubscribe-by-email-from-all-lists",
     *     tags={"list_subscribers"},
     *     operationId="unsubscribeByEmailFromAllLists",
     *     summary="Unsubscribe list subscriber from all lists by email",
     *     description="Unsubscribe list subscriber from all lists by email",
     *     @OA\RequestBody(
     *           required=true,
     *           description="List subscriber email",
     *           @OA\MediaType(
     *               mediaType="application/x-www-form-urlencoded",
     *               @OA\Schema(
     *                  type="object",
     *                  required={"EMAIL"},
     *                  @OA\Property(
     *                      property="EMAIL",
     *                      type="string",
     *                      format="email",
     *                      description="The email address of the subscriber"
     *                  )
     *              )
     *            )
     *       ),
     *     @OA\Response(
     *           response=200,
     *            description="Unsubscribe subscriber response",
     *            @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/ApiResponse")
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
     */
    public function actionUnsubscribe_by_email_from_all_lists()
    {
    }
}
