<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class Template
 *
 * @OA\Schema(
 *     schema="Template",
 *     type="object",
 *     description="Template model",
 *     title="Template model",
 * )
 */
class Template
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $template_uid;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $content;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $screenshot;
}
