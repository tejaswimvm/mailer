<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class ListField
 *
 * @OA\Schema(
 *     schema="ListField",
 *     type="object",
 *     description="List field model",
 *     title="List field model",
 * )
 */
class ListField
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $field_id;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $label;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $tag;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $help_text;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $default_value;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $required;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $visibility;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $sort_order;

    /**
     * @OA\Property(
     *     type="object",
     *     @OA\Property(
     *           property="name",
     *           type="string"
     *       ),
     *       @OA\Property(
     *           property="identifier",
     *           type="string"
     *       ),
     *      @OA\Property(
     *            property="description",
     *            type="string"
     *        )
     * )
     */
    public $type;

    /**
     * @OA\Property(
     *     type="object",
     *     @OA\Property(
     *           property="list_uid",
     *           type="string"
     *       ),
     *       @OA\Property(
     *           property="display_name",
     *           type="string"
     *       )
     * )
     */
    public $list;

    /**
     * @var array
     */
    public $options;
}
