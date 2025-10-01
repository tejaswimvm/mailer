<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignUpdateRequest.
 *
 * @OA\Schema(
 *     schema="CampaignUpdateRequest",
 *     type="object",
 *     description="Campaign update request",
 *     title="Campaign update request",
 *     allOf={@OA\Schema(ref="#/components/schemas/BaseCampaignRequest")}
 * )
 */
class CampaignUpdateRequest extends BaseCampaignRequest
{
}
