<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CampaignUnsubscribeResponse",
 *     type="object",
 *     description="Campaign unsubscribes response",
 *     title="Campaign unsubscribes response",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class CampaignUnsubscribeResponse extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var CampaignsTrackUrlResponseData
     */
    public $data;
}
