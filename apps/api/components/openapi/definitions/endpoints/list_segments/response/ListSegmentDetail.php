<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListSegmentDetail
 *
 * @OA\Schema(
 *     schema="ListSegmentDetail",
 *     type="object",
 *     description="List segment details model",
 *     title="List segment details model",
 *     allOf={@OA\Schema(ref="#/components/schemas/ListSegment")}
 * )
 */
class ListSegmentDetail extends ListSegment
{
    /**
     * @OA\Property()
     *
     * @var int
     */
    public $segment_id;

    /**
     * @OA\Property(
     *     enum={"any", "all"},
     *     schema="string"
     * )
     *
     * @var string
     */
    public $operator_match;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $date_added;

    /**
     * @OA\Property(
     *      type="array",
     *      @OA\Items(ref="#/components/schemas/ListSegmentCondition")
     *  )
     * @var array
     */
    public $conditions;

    /**
     * @OA\Property(
     *      type="array",
     *      @OA\Items(ref="#/components/schemas/ListSegmentCampaignCondition")
     *  )
     * @var array
     */
    public $campaign_conditions;
}
