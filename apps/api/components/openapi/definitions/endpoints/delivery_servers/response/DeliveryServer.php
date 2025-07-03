<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

use OpenApi\Annotations as OA;

/**
 * Class DeliveryServer
 *
 * @OA\Schema(
 *     schema="DeliveryServer",
 *     type="object",
 *     description="Delivery server model",
 *     title="Delivery server model",
 * )
 */
class DeliveryServer
{
    /**
     * @OA\Property()
     *
     * @var int
     */
    public $server_id;

    /**
     * @OA\Property(enum={"smtp", "smtp-amazon", "smtp-postmastery", "smtp-greenarrow", "smtp-postal", "smtp-mysmtpcom", "smtp-pmta", "smtp-inboxroad", "sendmail", "pickup-directory", "amazon-ses-web-api", "mailgun-web-api", "sendgrid-web-api", "inboxroad-web-api", "elasticemail-web-api", "sparkpost-web-api", "pepipost-web-api", "postmark-web-api", "mailjet-web-api", "mailerq-web-api", "sendinblue-web-api", "brevo-web-api", "tipimail-web-api", "newsman-web-api", "postal-web-api"})
     *
     * @var string
     */
    public $type;

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
    public $hostname;

    /**
     * @OA\Property(enum={"inactive", "active", "disabled", "hidden", "in-use", "pending-delete"})
     *
     * @var string
     */
    public $status;
}
