<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Transactional email response data collection",
 *     title="Transactional email response data collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponseDataCollection")}
 *  )
 */
class TransactionalEmailResponseDataCollection extends ApiResponseDataCollection
{

    /**
     * @OA\Property(
     *     description="Records",
     *     title="Records"
     * )
     *
     * @var TransactionalEmail[]
     */
    public $records;
}
