<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignDetail
 *
 * @OA\Schema(
 *     schema="CampaignDetail",
 *     type="object",
 *     description="Campaign detail model",
 *     title="Campaign detail model",
 *     allOf={@OA\Schema(ref="#/components/schemas/Campaign")}
 * )
 */
class CampaignDetail extends Campaign
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $from_name;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $from_email;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $to_name;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $reply_to;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $subject;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $date_added;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $send_at;

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
     *            property="subscribers_count",
     *            type="string"
     *       ),
     *  )
     */
    public $list;

    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="segment_uid",
     *           type="string"
     *      ),
     *      @OA\Property(
     *           property="name",
     *           type="string"
     *      ),
     *     @OA\Property(
     *            property="subscribers_count",
     *            type="integer"
     *       ),
     *  )
     */
    public $segment;
}
