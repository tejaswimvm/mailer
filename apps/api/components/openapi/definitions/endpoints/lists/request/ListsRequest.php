<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListsRequest.
 *
 * @OA\Schema(
 *     schema="ListsRequest",
 *     type="object",
 *     description="Lists request",
 *     title="Lists request",
 *     allOf={@OA\Schema(ref="#/components/schemas/BaseListsRequest")},
 *     required={"general[name]", "general[description]", "defaults[from_name]", "defaults[from_email]", "defaults[reply_to]"}
 * )
 */
class ListsRequest extends BaseListsRequest
{
}
