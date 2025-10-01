<?php declare(strict_types=1);



if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignBounce.
 *
 * @OA\Schema(
 *     schema="CampaignBounce",
 *     type="object",
 *     description="Campaign bounce model",
 *     title="Campaign bounce model",
 * )
 */
class CampaignBounce
{
    /**
     * @OA\Property(example="550 5.7.1 Unfortunately, messages from [XX.XX.XX.XX] weren't sent. ")
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(enum={"yes", "no"})
     *
     * @var string
     *
     */
    public $processed;

    /**
     * @OA\Property(enum={"internal", "soft", "hard"})
     *
     * @var string
     *
     */
    public $bounce_type;

    /**
     * @OA\Property(
     *     type="object",
     *     @OA\Property(
     *          property="subscriber_uid",
     *          type="string"
     *     ),
     *     @OA\Property(
     *          property="email",
     *          type="string"
     *     ),
     * )
     */
    public $subscriber;
}
