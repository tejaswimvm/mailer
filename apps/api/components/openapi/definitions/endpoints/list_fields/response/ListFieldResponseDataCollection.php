<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="List field response data collection",
 *     title="List field response data collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponseDataCollection")}
 *  )
 */
class ListFieldResponseDataCollection extends ApiResponseDataCollection
{

    /**
     * @OA\Property(
     *     description="Records",
     *     title="Records"
     * )
     *
     * @var ListField[]
     */
    public $records;
}
