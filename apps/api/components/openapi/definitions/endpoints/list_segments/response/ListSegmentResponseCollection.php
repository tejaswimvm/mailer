<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ListSegmentResponseCollection",
 *     type="object",
 *     description="List segment response collection",
 *     title="List segment response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class ListSegmentResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var ListSegmentResponseDataCollection
     */
    public $data;
}
