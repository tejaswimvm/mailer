<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(title="List segment request")
 */
class ListSegmentRequest
{
    /**
     * @OA\Property(
     *     property="name",
     *     description="The name of the segment",
     *     title="Name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $name;


    /**
     * @OA\Property(
     *     property="operator_match",
     *     type="string",
     *     title="Operator match",
     *     description="The glue between the conditions.Any for OR or All for AND.",
     *     enum={"any", "all"},
     *     example="any"
     * )
     *
     * @var string
     */
    public $operator_match;

    /**
     * @OA\Property(
     *     property="conditions[0][field_id]",
     *     type="string",
     *     title="Condition field id",
     *     description="Condition field id",
     * )
     *
     * @var string
     */
    public $conditions_field_id_0;

    /**
     * @OA\Property(
     *     property="conditions[0][operator_id]",
     *     type="string",
     *     title="Condition operator id",
     *     description="Condition operator id. See the API-URL/lists/segments/condition-operators endpoint"
     * )
     *
     * @var string
     */
    public $conditions_operator_id_0;

    /**
     * @OA\Property(
     *     property="conditions[0][value]",
     *     type="string",
     *     title="Condition value",
     *     description="Condition value"
     * )
     *
     * @var string
     */
    public $conditions_value_0;

    /**
     * @OA\Property(
     *     property="conditions[1][field_id]",
     *     type="string",
     *     title="Condition field id",
     *     description="Condition field id",
     * )
     *
     * @var string
     */
    public $conditions_field_id_1;

    /**
     * @OA\Property(
     *     property="conditions[1][operator_id]",
     *     type="string",
     *     title="Condition operator id",
     *     description="Condition operator id. See the API-URL/lists/segments/condition-operators endpoint"
     * )
     *
     * @var string
     */
    public $conditions_operator_id_1;

    /**
     * @OA\Property(
     *     property="conditions[1][value]",
     *     type="string",
     *     title="Condition value",
     *     description="Condition value"
     * )
     *
     * @var string
     */
    public $conditions_value_1;

    /**
     * @OA\Property(
     *     property="conditions[2][field_id]",
     *     type="string",
     *     title="Condition field id",
     *     description="Condition field id",
     * )
     *
     * @var string
     */
    public $conditions_field_id_2;

    /**
     * @OA\Property(
     *     property="conditions[2][operator_id]",
     *     type="string",
     *     title="Condition operator id",
     *     description="Condition operator id. See the API-URL/lists/segments/condition-operators endpoint"
     * )
     *
     * @var string
     */
    public $conditions_operator_id_2;

    /**
     * @OA\Property(
     *     property="conditions[2][value]",
     *     type="string",
     *     title="Condition value",
     *     description="Condition value"
     * )
     *
     * @var string
     */
    public $conditions_value_2;


    /**
     * @OA\Property(
     *     property="campaign_conditions[0]action",
     *     type="string",
     *     title="Campaign condition action",
     *     description="Campaign condition action",
     *     enum={"open", "click"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_action_0;

    /**
     * @OA\Property(
     *     property="campaign_conditions[0]campaign_id",
     *     type="string",
     *     title="Campaign condition campaign id",
     *     description="Campaign condition campaign id",
     * )
     *
     * @var string
     */
    public $campaign_conditions_campaign_id_0;

    /**
     * @OA\Property(
     *     property="campaign_conditions[0]time_comparison_operator",
     *     type="string",
     *     title="Campaign condition time comparison operator",
     *     description="Campaign condition time comparison operator",
     *     enum={"lte", "lt", "gte", "gt", "eq"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_time_comparison_operator_0;

    /**
     * @OA\Property(
     *     property="campaign_conditions[0]time_value",
     *     type="integer",
     *     title="Campaign condition time value",
     *     description="Campaign condition time value"
     * )
     *
     * @var integer
     */
    public $campaign_conditions_time_value_0;

    /**
     * @OA\Property(
     *     property="campaign_conditions[0]time_unit",
     *     type="string",
     *     title="Campaign condition time unit",
     *     description="Campaign condition time unit",
     *     enum={"day", "month", "year"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_time_unit_0;

    /**
     * @OA\Property(
     *     property="campaign_conditions[1]action",
     *     type="string",
     *     title="Campaign condition action",
     *     description="Campaign condition action",
     *     enum={"open", "click"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_action_1;

    /**
     * @OA\Property(
     *     property="campaign_conditions[1]campaign_id",
     *     type="string",
     *     title="Campaign condition campaign id",
     *     description="Campaign condition campaign id",
     * )
     *
     * @var string
     */
    public $campaign_conditions_campaign_id_1;

    /**
     * @OA\Property(
     *     property="campaign_conditions[1]time_comparison_operator",
     *     type="string",
     *     title="Campaign condition time comparison operator",
     *     description="Campaign condition time comparison operator",
     *     enum={"lte", "lt", "gte", "gt", "eq"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_time_comparison_operator_1;

    /**
     * @OA\Property(
     *     property="campaign_conditions[1]time_value",
     *     type="integer",
     *     title="Campaign condition time value",
     *     description="Campaign condition time value"
     * )
     *
     * @var integer
     */
    public $campaign_conditions_time_value_1;

    /**
     * @OA\Property(
     *     property="campaign_conditions[1]time_unit",
     *     type="string",
     *     title="Campaign condition time unit",
     *     description="Campaign condition time unit",
     *     enum={"day", "month", "year"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_time_unit_1;

    /**
     * @OA\Property(
     *     property="campaign_conditions[2]action",
     *     type="string",
     *     title="Campaign condition action",
     *     description="Campaign condition action",
     *     enum={"open", "click"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_action_2;

    /**
     * @OA\Property(
     *     property="campaign_conditions[2]campaign_id",
     *     type="string",
     *     title="Campaign condition campaign id",
     *     description="Campaign condition campaign id",
     * )
     *
     * @var string
     */
    public $campaign_conditions_campaign_id_2;

    /**
     * @OA\Property(
     *     property="campaign_conditions[2]time_comparison_operator",
     *     type="string",
     *     title="Campaign condition time comparison operator",
     *     description="Campaign condition time comparison operator",
     *     enum={"lte", "lt", "gte", "gt", "eq"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_time_comparison_operator_2;

    /**
     * @OA\Property(
     *     property="campaign_conditions[2]time_value",
     *     type="integer",
     *     title="Campaign condition time value",
     *     description="Campaign condition time value"
     * )
     *
     * @var integer
     */
    public $campaign_conditions_time_value_2;

    /**
     * @OA\Property(
     *     property="campaign_conditions[2]time_unit",
     *     type="string",
     *     title="Campaign condition time unit",
     *     description="Campaign condition time unit",
     *     enum={"day", "month", "year"}
     * )
     *
     * @var string
     */
    public $campaign_conditions_time_unit_2;
}
