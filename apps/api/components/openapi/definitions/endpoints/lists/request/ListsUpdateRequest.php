<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListsUpdateRequest.
 *
 * @OA\Schema(
 *     schema="ListsUpdateRequest",
 *     type="object",
 *     description="List update request",
 *     title="List update request",
 *     allOf={@OA\Schema(ref="#/components/schemas/BaseListsRequest")}
 * )
 */
class ListsUpdateRequest extends BaseListsRequest
{
}
