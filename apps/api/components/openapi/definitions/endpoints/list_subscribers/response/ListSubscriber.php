<?php declare(strict_types=1);


use OpenApi\Annotations as OA;

/**
 * Class ListSegment
 *
 * @OA\Schema(
 *     schema="ListSubscriber",
 *     type="object",
 *     description="List subscriber model",
 *     title="List subscriber model",
 * )
 */
class ListSubscriber
{
    /**
     * @OA\Property(
     *     property="subscriber_uid",
     *     description="The unique id of the subscriber",
     *     title="Subscriber uid",
     *     type="string"
     * )
     *
     * @var string
     */
    public $subscriber_uid;

    /**
     * @OA\Property(
     *     property="email",
     *     description="The email of the subscriber",
     *     title="Subscriber email",
     *     type="string"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     property="status",
     *     type="string",
     *     title="Status",
     *     description="The subscriber status.",
     *     enum={"unconfirmed", "confirmed", "blacklisted", "unsubscribed", "unapproved", "disabled", "moved"},
     *     example="confirmed"
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *     property="source",
     *     type="string",
     *     title="Source",
     *     description="The subscriber source.",
     *     enum={"web", "api", "import"},
     *     example="api"
     * )
     *
     * @var string
     */
    public $source;

    /**
     * @OA\Property(
     *     property="ip_address",
     *     description="The ip address of the subscriber",
     *     title="Subscriber ip address",
     *     type="string"
     * )
     *
     * @var string
     */
    public $ip_address;

    /**
     * @OA\Property(
     *     property="date_added",
     *     description="The date added of the subscriber",
     *     title="Subscriber date added",
     *     type="string"
     * )
     *
     * @var string
     */
    public $date_added;
}
