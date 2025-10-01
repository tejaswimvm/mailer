<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ListSubscriberWithListResponseCollection",
 *     type="object",
 *     description="List subscriber with list response collection",
 *     title="List subscriber with list response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class ListSubscriberWithListResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var ListSubscriberWithListResponseDataCollection
     */
    public $data;
}
