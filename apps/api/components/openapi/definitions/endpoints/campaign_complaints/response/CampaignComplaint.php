<?php declare(strict_types=1);



if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class CampaignComplaint.
 *
 * @OA\Schema(
 *     schema="CampaignComplaint",
 *     type="object",
 *     description="Campaign complaint model",
 *     title="Campaign complaint model",
 * )
 */
class CampaignComplaint
{
    /**
     * @OA\Property
     *
     * @var string
     */
    public $message;

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
