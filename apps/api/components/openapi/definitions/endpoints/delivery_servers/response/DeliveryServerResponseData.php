<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Delivery server response data",
 *     title="Delivery server response data"
 *  )
 */
class DeliveryServerResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var DeliveryServer
     */
    public $record;
}
