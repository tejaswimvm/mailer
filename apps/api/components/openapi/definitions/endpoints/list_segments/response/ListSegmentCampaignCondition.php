<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListSegmentCampaignCondition
 *
 * @OA\Schema(
 *     schema="ListSegmentCampaignCondition",
 *     type="object",
 *     description="List segment campaign condition model",
 *     title="List segment campaign condition model",
 * )
 */
class ListSegmentCampaignCondition
{
    /**
     * @OA\Property(
     *     enum={"click", "open"}
     * )
     *
     * @var string
     */
    public $action;

    /**
     * @OA\Property()
     *
     * @var int
     */
    public $campaign_id;

    /**
     * @OA\Property(
     *     enum={"lte", "lt", "gte", "gt", "eq"}
     * )
     *
     * @var string
     */
    public $time_comparison_operator;

    /**
     * @OA\Property()
     *
     * @var int
     */
    public $time_value;

    /**
     * @OA\Property(
     *     enum={"day", "month", "year"}
     * )
     *
     * @var string
     */
    public $time_unit;
}
