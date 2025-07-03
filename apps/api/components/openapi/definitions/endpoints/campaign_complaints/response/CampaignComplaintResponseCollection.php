<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CampaignComplaintResponseCollection",
 *     type="object",
 *     description="Campaign complaint response collection",
 *     title="Campaign complain response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class CampaignComplaintResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var CampaignComplaintResponseDataCollection
     */
    public $data;
}
