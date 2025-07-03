<?php declare(strict_types=1);

/**
 * Api application bootstrap file
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.0
 */

// define the type of application we are creating.
define('MW_APP_NAME', 'api');
define('MW_RUNNING_API_SCHEMA_CREATE', true);
define('MW_RETURN_APP_INSTANCE', true);

define('API_URL', '[API_URL]');
define('SITE_NAME', '[SITE_NAME]');
define('SITE_DESCRIPTION', '[SITE_DESCRIPTION]');

// and start an instance of it.
require_once __DIR__ . '/../../../init.php';
