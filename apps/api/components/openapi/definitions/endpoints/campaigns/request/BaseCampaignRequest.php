<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(title="Base campaign request")
 */
class BaseCampaignRequest
{
    /**
     * @OA\Property(
     *     property="campaign[name]",
     *     description="The name of the campaign",
     *     title="Name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     property="campaign[type]",
     *     type="string",
     *     title="Type",
     *     description="The type of the campaign",
     *     enum={"regular", "autoresponder"},
     *     nullable=true
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     property="campaign[status]",
     *     type="string",
     *     title="Status",
     *     description="The status of the campaign. Default is pending-sending",
     *     enum={"pending-sending", "draft", "paused"},
     *     nullable=true
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *     property="campaign[from_name]",
     *     type="string",
     *     title="From name",
     *     description="Campaign from name",
     *     example="John Doe"
     * )
     *
     * @var string
     */
    public $from_name;

    /**
     * @OA\Property(
     *      property="campaign[from_email]",
     *      type="string",
     *      title="From email",
     *      description="Campaign from email",
     *      example="john.doe@domain.com"
     *  )
     *
     * @var string
     */
    public $from_email;

    /**
     * @OA\Property(
     *       property="campaign[subject]",
     *       type="string",
     *       title="Subject",
     *       description="Campaign subject",
     *       example="Hey, I am testing the campaigns via API"
     * )
     *
     * @var string
     */
    public $subject;

    /**
     * @OA\Property(
     *        property="campaign[reply_to]",
     *        type="string",
     *        title="Reply to",
     *        description="Campaign reply to",
     *        example="john.doe@doe.com"
     *  )
     *
     * @var string
     */
    public $reply_to;

    /**
     * @OA\Property(
     *         property="campaign[send_at]",
     *         type="string",
     *         title="Send at",
     *         description="Campaign send date. This will use the timezone which customer selected",
     *         example="2024-02-20 20:00:00",
     * )
     *
     * @var string
     */
    public $send_at;

    /**
     * @OA\Property(
     *          property="campaign[list_uid]",
     *          type="string",
     *          title="List unique id",
     *          description="Campaign list unique id"
     *  )
     * @var string
     */
    public $list_uid;

    /**
     * @OA\Property(
     *           property="campaign[segment_uid]",
     *           type="string",
     *           title="List segment unique id",
     *           description="Campaign list segment unique id"
     *   )
     * @var string
     */
    public $segment_uid;

    /**
     * @OA\Property(
     *          property="campaign[group_uid]",
     *          type="string",
     *          title="Campaign group",
     *          description="Campaign group unique id.",
     *          nullable=true
     *  )
     */
    public $group_uid;

    // TEMPLATE BLOCK

    /**
     * @OA\Property(
     *     property="campaign[template][archive]",
     *     description="A zip file containing the template arhive. Please encode it in base64 before sending the request.",
     *     title="Archive",
     *     type="string"
     * ),
     */
    public $archive;

    /**
     * @OA\Property(
     *     property="campaign[template][template_uid]",
     *     description="Template unique id",
     *     title="Template unique id",
     *     type="string"
     * ),
     */
    public $template_uid;

    /**
     * @OA\Property(
     *     property="campaign[template][content]",
     *     description="Template content. Please encode it in base64 before sending the request.",
     *     title="Template content",
     *     type="string"
     * ),
     */
    public $content;

    /**
     * @OA\Property(
     *     property="campaign[template][inline_css]",
     *     description="Make the template css inline",
     *     title="Make the template css inline",
     *     type="string",
     *     enum={"yes", "no"}
     * ),
     */
    public $inline_css;

    /**
     * @OA\Property(
     *     property="campaign[template][plain_text]",
     *     description="The plain text content. Leave empty to autogenerate",
     *     title="The plain text content",
     *     type="string"
     * ),
     */
    public $plain_text;

    /**
     * @OA\Property(
     *     property="campaign[template][auto_plain_text]",
     *     description="Auto create the plain text version",
     *     title="Auto create the plain text version",
     *     type="string",
     *     enum={"yes", "no"}
     * ),
     */
    public $auto_plain_text;

    // END TEMPLATE BLOCK

    // OPTIONS BLOCK

    /**
     * @OA\Property(
     *      property="campaign[options][url_tracking]",
     *      type="string",
     *      title="Enable url tracking",
     *      description="Enable url tracking",
     *      enum={"yes", "no"},
     *      example="yes"
     *  )
     *
     * @var string
     *
     */
    public $url_tracking;

    /**
     * @OA\Property(
     *      property="campaign[options][tracking_domain_id]",
     *      type="integer",
     *      title="Tracking domain id",
     *      description="Tracking domain id"
     * )
     *
     * @var integer
     *
     */
    public $tracking_domain_id;

    /**
     * @OA\Property(
     *       property="campaign[options][json_feed]",
     *       type="string",
     *       title="Json feed",
     *       description="Json feed",
     *       enum={"yes", "no"},
     *       example="no"
     *   )
     */
    public $json_feed;

    /**
     * @OA\Property(
     *        property="campaign[options][xml_feed]",
     *        type="string",
     *        title="Xml feed",
     *        description="Xml feed",
     *        enum={"yes", "no"},
     *        example="no"
     *    )
     */
    public $xml_feed;

    /**
     * @OA\Property(
     *        property="campaign[options][plain_text_email]",
     *        type="string",
     *        title="Plain text email",
     *        description="Enable/Disable the plain text email",
     *        enum={"yes", "no"},
     *        example="yes"
     *    )
     */
    public $plain_text_email;

    /**
     * @OA\Property(
     *         property="campaign[options][email_stats]",
     *         type="string",
     *         title="Email stats",
     *         description="A valid email address where the stats will be sent",
     *         nullable="true"
     *     )
     */
    public $email_stats;

    /**
     * @OA\Property(
     *          property="campaign[options][autoresponder_event]",
     *          type="string",
     *          title="Autoresponder event",
     *          description="Autoresponder event. Only for the autoresponders",
     *          enum={"AFTER-SUBSCRIBE", "AFTER-SUBSCRIBE", "AFTER-CAMPAIGN-OPEN"},
     *      )
     */
    public $autoresponder_event;

    /**
     * @OA\Property(
     *           property="campaign[options][autoresponder_time_unit]",
     *           type="string",
     *           title="Autoresponder time unit",
     *           description="Autoresponder time unit. Only for the autoresponders",
     *           enum={"minute", "hour", "day", "week", "month", "year"},
     * )
     */
    public $autoresponder_time_unit;

    /**
     * @OA\Property(
     *           property="campaign[options][autoresponder_time_value]",
     *           type="integer",
     *           title="Autoresponder time value",
     *           description="Autoresponder time value. Only for the autoresponders"
     * )
     */
    public $autoresponder_time_value;

    /**
     * @OA\Property(
     *            property="campaign[options][autoresponder_open_campaign_id]",
     *            type="integer",
     *            title="Autoresponder open campaign id",
     *            description="Autoresponder open campaign id. Only if event is AFTER-CAMPAIGN-OPEN. This is the id of the campaign that will trigger this event. Only for the autoresponders",
     *  )
     */
    public $autoresponder_open_campaign_id;

    /**
     * @OA\Property(
     *            property="campaign[options][cronjob_enabled]",
     *            type="integer",
     *            title="Advanced recurring",
     *            description="Enable/Disable advanced recurring. Only for regular campaigns",
     *            enum={0, 1},
     *  )
     */
    public $cronjob_enabled;

    /**
     * @OA\Property(
     *         property="campaign[options][cronjob]",
     *         type="string",
     *         title="Cronjob frequency",
     *         description="Only if this campaign is advanced recurring (cronjob_enabled is set to 1), you can set a cron job style frequency.",
     *         example="0 0 * * *",
     * )
     */
    public $cronjob;

    // END OPTIONS BLOCK

    /**
     * @OA\Property(
     *          property="campaign[delivery_servers]",
     *          type="string",
     *          title="Campaign delivery servers",
     *          description="Campaign delivery servers ids, comma separated.",
     *          nullable=true
     *  )
     */
    public $delivery_servers;
}
