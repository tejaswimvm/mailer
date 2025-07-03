<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ListFieldTypeResponseCollection",
 *     type="object",
 *     description="List field types response",
 *     title="List field types response",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class ListFieldTypeResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var ListFieldTypeResponseDataCollection
     */
    public $data;
}
