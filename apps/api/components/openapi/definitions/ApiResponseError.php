<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     description="Api response error",
 *     title="Api response error"
 *   )
 */
class ApiResponseError
{
    /**
     * Response status
     * @var string
     *
     * @OA\Property(enum={"error"}, example="error")
     */
    public $status;

    /**
     * @OA\Property (
     *     description="Error",
     *     title="Error"
     * )
     * @var string
     */
    public $error;
}
