<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class TransactionalEmail
 *
 * @OA\Schema(
 *     schema="TransactionalEmail",
 *     type="object",
 *     description="Transactional email model",
 *     title="Transactional email model",
 * )
 */
class TransactionalEmail
{
    /**
     * @OA\Property()
     *
     * @var string
     */
    public $email_uid;

    /**
     * @OA\Property()
     *
     * @var
     */
    public $customer_uid;

    /**
     * @OA\Property(
     *     property="to_name",
     *     description="The to name",
     *     title="To name",
     *     type="string",
     * )
     *
     * @var string
     */
    public $to_name;

    /**
     * @OA\Property(
     *     property="to_email",
     *     description="The to email",
     *     title="To email",
     *     type="string",
     * )
     *
     * @var string
     */
    public $to_email;

    /**
     * @OA\Property(
     *     property="from_name",
     *     description="The from name",
     *     title="The from name",
     *     type="string",
     * )
     *
     * @var string
     */
    public $from_name;

    /**
     * @OA\Property(
     *     property="from_email",
     *     description="The from email",
     *     title="From email",
     *     type="string",
     * )
     *
     * @var string
     */
    public $from_email;

    /**
     * @OA\Property(
     *     property="reply_to_name",
     *     description="The reply to name",
     *     title="The reply to name",
     *     type="string",
     * )
     *
     * @var string
     */
    public $reply_to_name;

    /**
     * @OA\Property(
     *     property="reply_to_email",
     *     description="The reply to email",
     *     title="Reply to email",
     *     type="string",
     * )
     *
     * @var string
     */
    public $reply_to_email;

    /**
     * @OA\Property(
     *     property="subject",
     *     description="Transactional email subject.",
     *     title="Transactional email subject",
     *     type="string",
     * ),
     */
    public $subject;

    /**
     * @OA\Property(
     *     property="body",
     *     description="Transactional email body. Please encode it in base64 before sending the request.",
     *     title="Transactional email body",
     *     type="string",
     * ),
     */
    public $body;

    /**
     * @OA\Property(
     *     property="plain_text",
     *     description="Transactional email plain text.",
     *     title="Transactional email plain text",
     *     type="string",
     * ),
     */
    public $plain_text;

    /**
     * @OA\Property(
     *     property="priority",
     *     description="Transactional email priority.",
     *     title="Transactional email priority",
     *     type="integer",
     * ),
     */
    public $priority;

    /**
     * @OA\Property(
     *     property="retries",
     *     description="Transactional email retries.",
     *     title="Transactional email retries",
     *     type="integer",
     * ),
     */
    public $retries;

    /**
     * @OA\Property(
     *     property="max_retries",
     *     description="Transactional email max retries.",
     *     title="Transactional email max retries",
     *     type="integer",
     * ),
     */
    public $max_retries;

    /**
     * @OA\Property(
     *     property="send_at",
     *     description="Transactional email send at.",
     *     title="Transactional email send at",
     *     type="string",
     * ),
     */
    public $send_at;

    /**
     * @OA\Property(
     *     property="fallback_system_servers",
     *     description="The template fallback system servers",
     *     title="The template fallback system servers",
     *     type="string",
     *     enum={"yes", "no"}
     * ),
     */
    public $fallback_system_servers;

    /**
     * @OA\Property(
     *     property="status",
     *     type="string",
     *     title="Status",
     *     description="The status of the email. Default is not-sent",
     *     enum={"unsent", "sent", "failed"}
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $date_added;

    /**
     * @OA\Property()
     *
     * @var string
     */
    public $last_updated;

//    /**
//     * @var array
//     */
//    public $attachments;
}
