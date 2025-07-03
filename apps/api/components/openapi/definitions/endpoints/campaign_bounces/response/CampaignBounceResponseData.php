<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Campaign bounce response data",
 *     title="Campaign bounce response data"
 *  )
 */
class CampaignBounceResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var CampaignBounce
     */
    public $record;
}
