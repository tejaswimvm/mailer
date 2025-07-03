<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Transactional email response data",
 *     title="Transactional email response data"
 *  )
 */
class TransactionalEmailResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var TransactionalEmail
     */
    public $record;
}
