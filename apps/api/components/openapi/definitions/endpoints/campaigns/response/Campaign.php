<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class Campaign
 *
 * @OA\Schema(
 *     schema="Campaign",
 *     type="object",
 *     description="Campaign model",
 *     title="Campaign model",
 * )
 */
class Campaign
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $campaign_uid;

    /**
     * @OA\Property()
     *
     * @var int
     */
    public $campaign_id;

    /**
     * @OA\Property(enum={"regular", "autoresponder"})
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(enum={"draft", "pending-sending", "sending", "sent", "processing", "paused", "pending-delete", "blocked", "pending-approve"})
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *      type="object",
     *      @OA\Property(
     *           property="group_uid",
     *           type="string"
     *      ),
     *      @OA\Property(
     *           property="name",
     *           type="string"
     *      ),
     *  )
     */
    public $group;
}
