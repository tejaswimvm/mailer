<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class Lists
 *
 * @OA\Schema(
 *     schema="Lists",
 *     type="object",
 *     description="List model",
 *     title="List model",
 * )
 */
class Lists
{
    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="list_uid",
     *           type="string"
     *      ),
     *      @OA\Property(
     *           property="name",
     *           type="string"
     *      ),
     *     @OA\Property(
     *            property="display_name",
     *            type="string"
     *       ),
     *     @OA\Property(
     *            property="description",
     *            type="string"
     *       ),
     *  )
     */
    public $general;

    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="from_email",
     *           type="string"
     *      ),
     *      @OA\Property(
     *           property="from_name",
     *           type="string"
     *      ),
     *      @OA\Property(
     *            property="reply_to",
     *            type="string"
     *      ),
     *      @OA\Property(
     *            property="subject",
     *            type="string"
     *      ),
     *  )
     */
    public $defaults;

    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="subscribe",
     *           type="string",
     *           enum={"no", "yes"}
     *      ),
     *      @OA\Property(
     *            property="unsubscribe",
     *            type="string",
     *            enum={"no", "yes"}
     *      ),
     *      @OA\Property(
     *             property="subscribe_to",
     *             type="string"
     *       ),
     *      @OA\Property(
     *              property="unsubscribe_to",
     *              type="string"
     *      ),
     *  )
     */
    public $notifications;

    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="name",
     *           type="string"
     *      ),
     *      @OA\Property(
     *           property="address_1",
     *           type="string"
     *      ),
     *      @OA\Property(
     *            property="address_2",
     *            type="string"
     *      ),
     *      @OA\Property(
     *            property="zone_name",
     *            type="string"
     *       ),
     *      @OA\Property(
     *            property="city",
     *            type="string"
     *       ),
     *      @OA\Property(
     *            property="zip_code",
     *            type="string"
     *       ),
     *      @OA\Property(
     *            property="phone",
     *            type="string"
     *       ),
     *      @OA\Property(
     *             property="address_format",
     *             type="string",
     *             example="[COMPANY_NAME]\n[COMPANY_ADDRESS_1] [COMPANY_ADDRESS_2]\n[COMPANY_CITY] [COMPANY_ZONE] [COMPANY_ZIP]\n[COMPANY_COUNTRY]\n[COMPANY_WEBSITE]"
     *        ),
     *      @OA\Property(
     *             property="country",
     *             type="object",
     *             @OA\Property(
     *                 property="country_id",
     *                 type="integer"
     *             ),
     *             @OA\Property(
     *                  property="country_id",
     *                  type="integer"
     *             ),
     *             @OA\Property(
     *                   property="name",
     *                   type="string"
     *             ),
     *             @OA\Property(
     *                   property="code",
     *                   type="string"
     *             )
     *      )
     *  )
     */
    public $company;
}
