<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="List subscriber request",
 *     required={"EMAIL"}
 * )
 */
class ListSubscriberRequest
{
    /**
     * @OA\Property(
     *     property="EMAIL",
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
     *     property="FNAME",
     *     description="The first name of the subscriber",
     *     title="Subscriber first name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $firstName;

    /**
     * @OA\Property(
     *     property="LNAME",
     *     description="The last name of the subscriber",
     *     title="Subscriber last name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $lastName;

    /**
     * @OA\Property(
     *     property="details[status]",
     *     type="string",
     *     title="Status",
     *     description="The subscriber status.",
     *     enum={"unconfirmed", "confirmed", "blacklisted", "unsubscribed", "unapproved", "disabled", "moved"},
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *     property="details[source]",
     *     type="string",
     *     title="Status",
     *     description="The subscriber source.",
     *     enum={"web", "api", "import"}
     * )
     *
     * @var string
     */
    public $source;

    /**
     * @OA\Property(
     *     property="details[ip_address]",
     *     description="The ip address of the subscriber",
     *     title="Subscriber ip address",
     *     type="string"
     * )
     *
     * @var string
     */
    public $ip_address;
}
