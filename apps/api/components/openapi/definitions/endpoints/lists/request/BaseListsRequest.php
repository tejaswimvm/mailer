<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(title="Base lists request")
 */
class BaseListsRequest
{
    /**
     * @OA\Property(
     *     property="general[name]",
     *     description="The name of the list",
     *     title="Name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     property="general[description]",
     *     description="The description of the list",
     *     title="Description",
     *     type="string"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     property="defaults[from_name]",
     *     type="string",
     *     title="From name",
     *     description="List from name",
     *     example="John Doe"
     * )
     *
     * @var string
     */
    public $from_name;

    /**
     * @OA\Property(
     *      property="defaults[from_email]",
     *      type="string",
     *      title="From email",
     *      description="List from email",
     *      example="john.doe@domain.com"
     *  )
     *
     * @var string
     */
    public $from_email;

    /**
     * @OA\Property(
     *       property="defaults[subject]",
     *       type="string",
     *       title="Subject",
     *       description="List subject",
     *       example="Hey, I am testing the lists via API"
     * )
     *
     * @var string
     */
    public $subject;

    /**
     * @OA\Property(
     *        property="defaults[reply_to]",
     *        type="string",
     *        title="Reply to",
     *        description="List reply to",
     *        example="john.doe@doe.com"
     *  )
     *
     * @var string
     */
    public $reply_to;

    /**
     * @OA\Property(
     *     property="notifications[subscribe]",
     *     description="Notification when new subscriber added",
     *     title="Notification when new subscriber added",
     *     type="string",
     *     enum={"yes", "no"}
     * ),
     */
    public $subscribe;

    /**
     * @OA\Property(
     *     property="notifications[unsubscribe]",
     *     description="Notification when a subscriber unsubscribe",
     *     title="Notification when a subscriber unsubscribe",
     *     type="string",
     *     enum={"yes", "no"}
     * ),
     */
    public $unsubscribe;

    /**
     * @OA\Property(
     *        property="notifications[subscribe_to]",
     *        type="string",
     *        title="Subscribe to",
     *        description="Subscribe to",
     *        example="john.doe@doe.com"
     *  )
     *
     * @var string
     */
    public $subscribe_to;

    /**
     * @OA\Property(
     *        property="notifications[unsubscribe_to]",
     *        type="string",
     *        title="Unsubscribe to",
     *        description="Unsubscribe to",
     *        example="john.doe@doe.com"
     *  )
     *
     * @var string
     */
    public $unsubscribe_to;


    /**
     * @OA\Property(
     *     property="company[name]",
     *     type="string"
     * ),
     * @var string
     */
    public $company_name;

    /**
     * @OA\Property(
     *     property="company[country]",
     *     type="string"
     * )
     *
     * @var string
     */
    public $company_country;

    /**
     * @OA\Property(
     *     property="company[address_1]",
     *     type="string"
     * ),
     *
     * @var string
     */
    public $company_address_1;

    /**
     * @OA\Property(
     *     property="company[address_2]",
     *     type="string"
     * ),
     *
     * @var string
     */
    public $company_address_2;

    /**
     * @OA\Property(
     *     property="company[zone_name]",
     *     type="string"
     * ),
     *
     * @var string
     */
    public $company_zone_name;

    /**
     * @OA\Property(
     *     property="company[city]",
     *     type="string"
     * ),
     *
     * @var string
     */
    public $company_city;

    /**
     * @OA\Property(
     *     property="company[zip_code]",
     *     type="string"
     * )
     *
     * @var string
     */
    public $company_zip_code;

    /**
     * @OA\Property(
     *     property="company[phone]",
     *     type="string"
     * )
     *
     * @var string
     */
    public $company_phone;

    /**
     * @OA\Property(
     *     property="company[address_format]",
     *     type="string",
     *     example="[COMPANY_NAME]\n[COMPANY_ADDRESS_1] [COMPANY_ADDRESS_2]\n[COMPANY_CITY] [COMPANY_ZONE] [COMPANY_ZIP]\n[COMPANY_COUNTRY]\n[COMPANY_WEBSITE]"
     * ),
     * @var string
     */
    public $company_address_format;
}
