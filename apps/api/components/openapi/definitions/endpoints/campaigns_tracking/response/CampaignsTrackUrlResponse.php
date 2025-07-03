<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CampaignsTrackUrlResponse",
 *     type="object",
 *     description="Campaign track url response",
 *     title="Campaign track url response",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class CampaignsTrackUrlResponse extends ApiResponse
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
