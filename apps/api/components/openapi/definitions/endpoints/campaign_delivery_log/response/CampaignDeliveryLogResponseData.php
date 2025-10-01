<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Campaign delivery log response data",
 *     title="Campaign delivery log response data"
 *  )
 */
class CampaignDeliveryLogResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var CampaignDeliveryLog
     */
    public $record;
}
