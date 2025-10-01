<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *       description="Api response data collection",
 *       title="Api response data collection",
 *   )
 */
class ApiResponseDataCollection
{

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Count",
     *     title="Count",
     * )
     *
     * @var int
     */
    public $count;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Current page",
     *     title="Current page",
     * )
     *
     * @var int
     */
    public $current_page;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Next page",
     *     title="Next page",
     * )
     *
     * @var int
     */
    public $next_page;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Previous page",
     *     title="Previous page",
     * )
     *
     * @var int
     */
    public $prev_page;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Total pages",
     *     title="Total pages",
     * )
     *
     * @var int
     */
    public $total_pages;
}
