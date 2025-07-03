<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="List field response data",
 *     title="List field response data"
 *  )
 */
class ListFieldResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var ListField[]
     */
    public $record;
}
