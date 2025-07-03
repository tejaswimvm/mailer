<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     description="Campaign track url response data",
 *     title="Campaign track url response data"
 *  )
 */
class CampaignsTrackUrlResponseData
{

    /**
     * @OA\Property(
     *     description="Record",
     *     title="Record",
     *     type="object",
     *       @OA\Property(
     *            property="track_url",
     *            type="string"
     *       ),
     *       @OA\Property(
     *            property="destination",
     *            type="string"
     *       ),
     * )
     */
    public $record;
}
