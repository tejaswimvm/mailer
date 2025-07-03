<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListFieldType
 *
 * @OA\Schema(
 *     schema="ListFieldType",
 *     type="object",
 *     description="List field type model",
 *     title="List field type model",
 * )
 */
class ListFieldType
{
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
    public $identifier;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $description;
}
