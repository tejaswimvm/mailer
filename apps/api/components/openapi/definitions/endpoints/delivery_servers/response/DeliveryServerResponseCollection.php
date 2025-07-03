<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="DeliveryServerResponseCollection",
 *     type="object",
 *     description="Delivery server response collection",
 *     title="Delivery server response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class DeliveryServerResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var DeliveryServerResponseDataCollection
     */
    public $data;
}
