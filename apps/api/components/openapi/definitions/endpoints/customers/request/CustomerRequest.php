<?php declare(strict_types=1);

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CustomerRequest",
 *     type="object",
 *     title="Customer request",
 *     description="Customer request",
 *     required={
 *           "customer[first_name]", "customer[last_name]", "customer[email]", "customer[confirm_email]",  "customer[password]", "customer[confirm_password]", "customer[timezone]", "customer[birthDate]",
 *           "company[name]", "company[country]", "company[address_1]", "company[city]", "company[zip_code]"
 *     }
 *)
 */
class CustomerRequest
{
    /**
     * @OA\Property(
     *     property="customer[first_name]",
     *     description="Customer first name",
     *     title="First name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *     property="customer[last_name]",
     *     description="Customer last name",
     *     title="Last name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *     property="customer[email]",
     *     description="Customer email",
     *     title="Email",
     *     type="string"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     property="customer[confirm_email]",
     *     description="Customer confirm email",
     *     title="Confirm email",
     *     type="string"
     * )
     *
     * @var string
     */
    public $confirm_email;

    /**
     * @OA\Property(
     *     property="customer[password]",
     *     description="Customer password",
     *     title="Password",
     *     type="string"
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *     property="customer[confirm_password]",
     *     description="Confirm password",
     *     title="Confirm Password",
     *     type="string"
     * )
     *
     * @var string
     */
    public $confirm_password;

    /**
     * @OA\Property(
     *     property="customer[timezone]",
     *     description="Customer timezone",
     *     title="Timezone",
     *     type="string",
     *     example="UTC"
     * )
     *
     * @var string
     */
    public $timezone;

    /**
     * @OA\Property(
     *     property="customer[birthDate]",
     *     description="Customer birth date. Use Y-m-d format",
     *     title="Birth date",
     *     type="string"
     * )
     *
     * @var string
     */
    public $birthDate;

    /**
     * @OA\Property(
     *     property="customer[newsletter_consent]",
     *     description="Newsletter consent",
     *     title="Newsletter consent",
     *     type="string",
     *     example="Agree to add me to the newsletter"
     * )
     *
     * @var string
     */
    public $newsletter_consent;

    /**
     * @OA\Property(
     *     property="company[name]",
     *     description="Customer company name",
     *     title="Company name",
     *     type="string"
     * )
     *
     * @var string
     */
    public $company_name;

    /**
     * @OA\Property(
     *     property="company[country]",
     *     description="Customer company country. See the countries endpoint for available countries and their zones",
     *     title="Company country",
     *     type="string",
     *     example="United States"
     * )
     *
     * @var string
     */
    public $company_country;

    /**
     * @OA\Property(
     *     property="company[zone]",
     *     description="Customer company zone. See the countries endpoint for available countries and their zones",
     *     title="Company zone",
     *     type="string",
     *     example="New York"
     * )
     *
     * @var string
     */
    public $company_zone;

    /**
     * @OA\Property(
     *     property="company[city]",
     *     description="Customer company city",
     *     title="Company city",
     *     type="string",
     *     example="Brooklyn"
     * )
     *
     * @var string
     */
    public $company_city;

    /**
     * @OA\Property(
     *     property="company[zip_code]",
     *     description="Customer company zip code",
     *     title="Company zip code",
     *     type="string",
     *     example="11222"
     * )
     *
     * @var string
     */
    public $company_zip_code;

    /**
     * @OA\Property(
     *     property="company[address_1]",
     *     description="Customer company address line 1",
     *     title="Company address line 1",
     *     type="string"
     * )
     *
     * @var string
     */
    public $company_address_1;

    /**
     * @OA\Property(
     *     property="company[address_2]",
     *     description="Customer company address line 2",
     *     title="Company address line 2",
     *     type="string"
     * )
     *
     * @var string
     */
    public $company_address_2;
}
