<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Campaign unsubscribes response data",
 *     title="Campaign unsubscribes response data"
 *  )
 */
class CampaignUnsubscribeResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     * )
     *
     * @var CampaignUnsubscribe
     */
    public $record;
}
