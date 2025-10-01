<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignRequest.
 *
 * @OA\Schema(
 *     schema="CampaignRequest",
 *     type="object",
 *     description="Campaign request",
 *     title="Campaign request",
 *     allOf={@OA\Schema(ref="#/components/schemas/BaseCampaignRequest")},
 *     required={"campaign[name]", "campaign[from_name]", "campaign[from_email]", "campaign[subject]", "campaign[reply_to]", "campaign[send_at]", "campaign[list_uid]"}
 * )
 */
class CampaignRequest extends BaseCampaignRequest
{
}
