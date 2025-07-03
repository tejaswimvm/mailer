<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignStats
 *
 * @OA\Schema(
 *     schema="CampaignStats",
 *     type="object",
 *     description="Campaign stats",
 *     title="Campaign stats",
 * )
 */
class CampaignStats
{
    /**
     * @OA\Property(enum={"draft", "pending-sending", "sending", "sent", "processing", "paused", "pending-delete", "blocked", "pending-approve"})
     *
     * @var string
     */
    public $campaign_status;

    /**
     * @OA\Property()
     * @var int
     */
    public $subscribers_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $processed_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $delivery_success_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $delivery_success_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $delivery_error_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $delivery_error_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $opens_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $opens_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $unique_opens_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $unique_opens_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $clicks_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $clicks_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $unique_clicks_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $unique_clicks_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $unsubscribes_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $unsubscribes_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $complaints_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $complaints_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $bounces_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $bounces_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $hard_bounces_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $hard_bounces_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $soft_bounces_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $soft_bounces_rate;

    /**
     * @OA\Property()
     * @var int
     */
    public $internal_bounces_count;

    /**
     * @OA\Property()
     * @var int
     */
    public $internal_bounces_rate;
}
