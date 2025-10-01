<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignDeliveryLog.
 *
 * @OA\Schema(
 *     schema="CampaignDeliveryLog",
 *     type="object",
 *     description="Campaign delivery log model",
 *     title="Campaign delivery log model",
 * )
 */
class CampaignDeliveryLog
{
    /**
     * @OA\Property(
     *     type="object",
     *     @OA\Property(
     *           property="campaign_uid",
     *           type="string"
     *     ),
     *     @OA\Property(
     *           property="list",
     *           type="object",
     *           @OA\Property(
     *              property="list_uid",
     *              type="string"
     *           )
     *     ),
     * )
     */
    public $campaign;

    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="subscriber_uid",
     *           type="string"
     *      ),
     *      @OA\Property(
     *           property="email",
     *           type="string"
     *      ),
     *  )
     */
    public $subscriber;

    /**
     * @OA\Property(example="OK")
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(example="0")
     *
     * @var int
     */
    public $retries;

    /**
     * @OA\Property(example="3")
     *
     * @var int
     */
    public $max_retries;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $email_message_id;

    /**
     * @OA\Property(enum={"yes", "no"}, example="yes")
     *
     * @var string
     *
     */
    public $delivery_confirmed;

    /**
     * @OA\Property(enum={"success", "error", "fatal-error", "temporary-error", "blacklisted", "suppressed", "giveup", "blocked", "ds-dp-reject", "hdl-by-sg-cmp"}, example="success")
     *
     * @var string
     *
     */
    public $status;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $date_added;
}
