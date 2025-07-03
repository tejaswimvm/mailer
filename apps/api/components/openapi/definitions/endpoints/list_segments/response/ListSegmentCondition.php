<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListSegment
 *
 * @OA\Schema(
 *     schema="ListSegmentCondition",
 *     type="object",
 *     description="List segment condition model",
 *     title="List segment condition model",
 * )
 */
class ListSegmentCondition
{
    /**
     * @OA\Property()
     *
     * @var int
     */
    public $field_id;

    /**
     * @OA\Property()
     *
     * @var int
     */
    public $operator_id;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $value;
}
