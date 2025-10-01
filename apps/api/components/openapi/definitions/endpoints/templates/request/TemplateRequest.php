<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Template request",
 *     required={"template[name]"}
 *     )
 */
class TemplateRequest
{
    /**
     * @OA\Property(
     *     property="template[name]",
     *     description="The name of the template",
     *     title="Name",
     *     type="string",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     property="template[content]",
     *     description="Template content. Please encode it in base64 before sending the request.",
     *     title="Template content",
     *     type="string",
     * ),
     */
    public $content;

    /**
     * @OA\Property(
     *     property="template[archive]",
     *     description="A zip file containing the template arhive. Please encode it in base64 before sending the request.",
     *     title="Archive",
     *     type="string"
     * ),
     */
    public $archive;

    /**
     * @OA\Property(
     *     property="template[inline_css]",
     *     description="Make the template css inline",
     *     title="Make the template css inline",
     *     type="string",
     *     enum={"yes", "no"}
     * ),
     */
    public $inline_css;
}
