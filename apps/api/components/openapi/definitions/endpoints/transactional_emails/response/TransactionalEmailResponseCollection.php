<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TransactionalEmailResponseCollection",
 *     type="object",
 *     description="Transactional email response collection",
 *     title="Transactional email response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class TransactionalEmailResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var TransactionalEmailResponseDataCollection
     */
    public $data;
}
