<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ListSegmentResponse",
 *     type="object",
 *     description="List segment response",
 *     title="List segment response",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class ListSegmentResponse extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var ListSegmentResponseData
     */
    public $data;
}
