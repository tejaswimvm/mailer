<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="List subscriber with list response data collection",
 *     title="List subscriber with list response data collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponseDataCollection")}
 *  )
 */
class ListSubscriberWithListResponseDataCollection extends ApiResponseDataCollection
{

    /**
     * @OA\Property(
     *     description="Records",
     *     title="Records"
     * )
     *
     * @var ListSubscriberWithList[]
     */
    public $records;
}
