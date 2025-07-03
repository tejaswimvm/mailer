<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class Country
 *
 * @OA\Schema(
 *     schema="Country",
 *     type="object",
 *     description="Country model",
 *     title="Country model",
 * )
 */
class Country
{
    /**
     * @OA\Property()
     *
     * @var int
     */
    public $country_id;


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
