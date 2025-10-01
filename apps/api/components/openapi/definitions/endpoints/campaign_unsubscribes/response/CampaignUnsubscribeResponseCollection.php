<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CampaignUnsubscribeResponseCollection",
 *     type="object",
 *     description="Campaign unsubscribes response collection",
 *     title="Campaign unsubscribes response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class CampaignUnsubscribeResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var CampaignUnsubscribeResponseDataCollection
     */
    public $data;
}
