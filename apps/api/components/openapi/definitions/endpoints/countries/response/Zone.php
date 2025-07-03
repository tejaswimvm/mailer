<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class Zone
 *
 * @OA\Schema(
 *     schema="Zone",
 *     type="object",
 *     description="Zone model",
 *     title="Zone model",
 * )
 */
class Zone
{
    /**
     * @OA\Property()
     *
     * @var int
     */
    public $zone_id;


    /**
     * @OA\Property()
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $code;
}
