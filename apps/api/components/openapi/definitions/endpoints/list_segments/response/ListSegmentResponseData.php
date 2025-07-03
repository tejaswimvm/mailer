<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="List segment response data",
 *     title="List segment response data"
 *  )
 */
class ListSegmentResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var ListSegmentDetail[]
     */
    public $record;
}
