<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\SecurityScheme(
 *      securityScheme="apiKey",
 *      type="apiKey",
 *      in="header",
 *      name="X-API-KEY"
 *  )
 */
class ApiAuth
{
}
