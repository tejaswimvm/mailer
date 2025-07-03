<?php declare(strict_types=1);

if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TemplateResponseCollection",
 *     type="object",
 *     description="Template response collection",
 *     title="Template response collection",
 *     allOf={@OA\Schema(ref="#/components/schemas/ApiResponse")}
 *  )
 */
final class TemplateResponseCollection extends ApiResponse
{
    /**
     * @OA\Property(
     *     description="Api response data",
     *     title="Response data"
     * )
     *
     * @var TemplateResponseDataCollection
     */
    public $data;
}
