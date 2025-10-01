<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Transactional email request",
 *     required={"email[to_name]", "email[to_email]", "email[from_name]", "email[subject]", "email[body]", "email[send_at]"}
 *     )
 */
class TransactionalEmailRequest
{
    /**
     * @OA\Property(
     *     property="email[to_name]",
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
     *     property="email[to_email]",
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
     *     property="email[from_name]",
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
     *     property="email[from_email]",
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
     *     property="email[reply_to_name]",
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
     *     property="email[reply_to_email]",
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
     *     property="email[subject]",
     *     description="Transactional email subject.",
     *     title="Transactional email subject",
     *     type="string",
     * ),
     */
    public $subject;

    /**
     * @OA\Property(
     *     property="email[body]",
     *     description="Transactional email body. Please encode it in base64 before sending the request.",
     *     title="Transactional email body",
     *     type="string",
     * ),
     */
    public $body;

    /**
     * @OA\Property(
     *     property="email[plain_text]",
     *     description="Transactional email plain text.",
     *     title="Transactional email plain text",
     *     type="string",
     * ),
     */
    public $plain_text;

    /**
     * @OA\Property(
     *     property="email[send_at]",
     *     description="Transactional email send at.",
     *     title="Transactional email send at. UTC date time in the format 'Y-m-d H:i:s'.",
     *     type="string",
     * ),
     */
    public $send_at;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][0][name]",
     *     description="File name with extension"
     * )
     * @var string
     */
    public $attachment_name_0;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][0][type]",
     *     description="MIME type of the file.",
     *     example="image/png"
     * )
     * @var string
     */
    public $attachment_type_0;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][0][data]",
     *     description="Base64 encoded file data"
     * )
     * @var string
     */
    public $attachment_data_0;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][1][name]",
     *     description="File name with extension"
     * )
     * @var string
     */
    public $attachment_name_1;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][1][type]",
     *     description="MIME type of the file.",
     *     example="image/png"
     * )
     * @var string
     */
    public $attachment_type_1;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][1][data]",
     *     description="Base64 encoded file data"
     * )
     * @var string
     */
    public $attachment_data_1;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][2][name]",
     *     description="File name with extension"
     * )
     * @var string
     */
    public $attachment_name_2;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][2][type]",
     *     description="MIME type of the file.",
     *     example="image/png"
     * )
     * @var string
     */
    public $attachment_type_2;

    /**
     * @OA\Property(
     *     type="string",
     *     property="email[attachments][2][data]",
     *     description="Base64 encoded file data"
     * )
     * @var string
     */
    public $attachment_data_2;
}
