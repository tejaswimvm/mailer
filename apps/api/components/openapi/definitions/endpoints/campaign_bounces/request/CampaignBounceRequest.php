<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignBounceRequestBody.
 *
 * @OA\Schema(
 *     schema="CampaignBounceRequest",
 *     type="object",
 *     description="Campaign bounce request",
 *     title="Campaign bounce request",
 *     required={"bounce_type", "subscriber_uid"},
 * )
 */
class CampaignBounceRequest
{
    /**
     * @OA\Property(example="550 5.7.1 Unfortunately, messages from [XX.XX.XX.XX] weren't sent. ")
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(enum={"internal", "soft", "hard"})
     *
     * @var string
     *
     */
    public $bounce_type;

    /**
     * @OA\Property
     *
     * @var string
     */
    public $subscriber_uid;
}
