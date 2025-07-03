<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="List field type response data collection",
 *     title="List field type response data collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponseDataCollection")}
 *  )
 */
class ListFieldTypeResponseDataCollection extends ApiResponseDataCollection
{

    /**
     * @OA\Property(
     *     description="Records",
     *     title="Records"
     * )
     *
     * @var ListFieldType[]
     */
    public $records;
}
