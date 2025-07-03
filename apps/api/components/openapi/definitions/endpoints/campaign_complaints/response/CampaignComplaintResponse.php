<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CampaignComplaintResponse",
 *     type="object",
 *     description="Campaign complaint response",
 *     title="Campaign complaint response",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class CampaignComplaintResponse extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var CampaignComplaintResponseData
     */
    public $data;
}
