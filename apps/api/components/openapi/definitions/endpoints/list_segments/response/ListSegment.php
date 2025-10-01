<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListSegment
 *
 * @OA\Schema(
 *     schema="ListSegment",
 *     type="object",
 *     description="List segment model",
 *     title="List segment model",
 * )
 */
class ListSegment
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $segment_uid;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property()
     *
     * @var int
     */
    public $subscribers_count;
}
