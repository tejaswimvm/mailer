<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListSegmentConditionOperator
 *
 * @OA\Schema(
 *     schema="ListSegmentConditionOperator",
 *     type="object",
 *     description="List segment condition operator model",
 *     title="List segment condition operator model",
 * )
 */
class ListSegmentConditionOperator
{
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
    public $name;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $slug;
}
