<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     description="Api response",
 *     title="Api response",
 *  )
 */
class ApiResponse
{

    /**
     * Response status
     * @var string
     *
     * @OA\Property(enum={"success", "error"})
     */
    public $status;
}
