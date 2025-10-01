<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignUnsubscribe.
 *
 * @OA\Schema(
 *     schema="CampaignUnsubscribe",
 *     type="object",
 *     description="Campaign unsubscribe model",
 *     title="Campaign unsubscribe model",
 * )
 */
class CampaignUnsubscribe
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $ip_address;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $user_agent;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $reason;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $note;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $date_added;

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
}
