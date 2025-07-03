<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ListSegmentConditionOperatorResponseCollection",
 *     type="object",
 *     description="List segment condition operator response",
 *     title="List segment condition operator response",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class ListSegmentConditionOperatorResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var ListSegmentConditionOperatorResponseDataCollection
     */
    public $data;
}
