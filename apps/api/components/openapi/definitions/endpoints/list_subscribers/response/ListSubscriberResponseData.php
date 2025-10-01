<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="List subscriber response data",
 *     title="List subscriber response data"
 *  )
 */
class ListSubscriberResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var ListSubscriber[]
     */
    public $record;
}
