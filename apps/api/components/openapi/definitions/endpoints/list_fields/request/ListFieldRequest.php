<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(title="List field request")
 */
class ListFieldRequest
{
    /**
     * @OA\Property(
     *     property="type",
     *     description="The type of the field",
     *     title="Type",
     *     type="string",
     *     description="See the API-URL/lists/fields/types endpoint"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     property="label",
     *     description="The label of the field",
     *     title="Label",
     *     type="string"
     * )
     *
     * @var string
     */
    public $label;

    /**
     * @OA\Property(
     *     property="tag",
     *     description="The tag of the field",
     *     title="Tag",
     *     type="string"
     * )
     *
     * @var string
     */
    public $tag;


    /**
     * @OA\Property(
     *     property="required",
     *     type="string",
     *     title="Required",
     *     description="Whether this field is required or not",
     *     enum={"yes", "no"},
     *     example="no"
     * )
     *
     * @var string
     */
    public $required;

    /**
     * @OA\Property(
     *     property="visibility",
     *     type="string",
     *     title="Visibility",
     *     description="Whether this field is visible or not",
     *     enum={"visible", "hidden", "none"},
     *     example="visible"
     * )
     *
     * @var string
     */
    public $visibility;

    /**
     * @OA\Property(
     *     property="sort_order",
     *     type="integer",
     *     title="Sort order",
     * )
     *
     * @var string
     */
    public $sort_order;

    /**
     * @OA\Property(
     *     property="help_text",
     *     type="string",
     *     title="Help text",
     * )
     *
     * @var string
     */
    public $help_text;

    /**
     * @OA\Property(
     *     property="default_value",
     *     type="string",
     *     title="Default value",
     * )
     *
     * @var string
     */
    public $default_value;

    /**
     * @OA\Property(
     *     property="description",
     *     type="string",
     *     title="Description",
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     property="options[0][name]",
     *     type="string",
     *     title="Option name",
     *     description="Option name",
     *     nullable="true"
     * )
     *
     * @var string
     */
    public $options_name_0;

    /**
     * @OA\Property(
     *     property="options[0][value]",
     *     type="string",
     *     title="Option value",
     *     description="Option value",
     *     nullable="true"
     * )
     *
     * @var string
     */
    public $options_value_0;

    /**
     * @OA\Property(
     *     property="options[1][name]",
     *     type="string",
     *     title="Option name",
     *     description="Option name",
     *     nullable="true"
     * )
     *
     * @var string
     */
    public $options_name_1;

    /**
     * @OA\Property(
     *     property="options[1][value]",
     *     type="string",
     *     title="Option value",
     *     description="Option value",
     *     nullable="true"
     * )
     *
     * @var string
     */
    public $options_value_1;

    /**
     * @OA\Property(
     *     property="options[2][name]",
     *     type="string",
     *     title="Option name",
     *     description="Option name",
     *     nullable="true"
     * )
     *
     * @var string
     */
    public $options_name_2;

    /**
     * @OA\Property(
     *     property="options[2][value]",
     *     type="string",
     *     title="Option value",
     *     description="Option value",
     *     nullable="true"
     * )
     *
     * @var string
     */
    public $options_value_2;
}
