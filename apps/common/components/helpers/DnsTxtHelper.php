<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * DnsTxtHelper
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.3.6.6
 */

class DnsTxtHelper
{
    /**
     * @return array
     */
    public static function getDkimRequirementsErrors(): array
    {
        $errors = [];
        if (!defined('PKCS7_TEXT')) {
            $errors[] = t('sending_domains', 'OpenSSL extension missing.');
        }
        $functions = ['exec', 'escapeshellarg', 'dns_get_record', 'openssl_pkey_get_private', 'openssl_sign', 'openssl_error_string'];
        foreach ($functions as $func) {
            if (!CommonHelper::functionExists($func)) {
                $errors[] = t('sending_domains', '{func} function must be enabled in order to handle the DKIM keys.', ['{func}' => $func]);
            }
        }
        return $errors;
    }

    /**
     * @return array
     */
    public static function generateDkimKeys(): array
    {
        if ($errors = self::getDkimRequirementsErrors()) {
            return ['errors' => $errors];
        }

        $key = StringHelper::random(10);
        $publicKey   = $key . '.public';
        $privateKey  = $key . '.private';
        $tempStorage = (string)Yii::getPathOfAlias('common.runtime.dkim');

        if ((!file_exists($tempStorage) || !is_dir($tempStorage)) && !mkdir($tempStorage)) {
            return ['errors' => [t('sending_domains', 'Unable to create {dir} directory.', ['{dir}' => $tempStorage])]];
        }

        // try to make it writable
        chmod($tempStorage, 0777);

        // private key
        $keySize = (int)app_param('email.custom.dkim.key.size', 2048);
        // since 2.4.5
        // Use -traditional flag to generate a key in PKCS#1 format, otherwise, some systems will generate in PKCS#8 format
        // which, even if our system allows since this version, will fail on some SMTP servers.
        // Staying with the PKCS#1 format seems like a wiser choice given the nature of SMTP servers which are updated not so often.
        // Update in 2.4.6(issue #1105): If the -traditional flag does not exist, we fail to generate the key, so we need to try both command variations.
        $commandPlaceholder = 'cd %s && /usr/bin/openssl genrsa %s -out %s %d > /dev/null 2>&1';
        $commands = [
            sprintf($commandPlaceholder, escapeshellarg($tempStorage), '-traditional', escapeshellarg($privateKey), $keySize),
            sprintf($commandPlaceholder, escapeshellarg($tempStorage), '', escapeshellarg($privateKey), $keySize),
        ];
        $execSuccess = false;
        foreach ($commands as $command) {
            exec($command, $output, $return);
            if ((int)$return === 0) {
                $execSuccess = true;
                break;
            }
        }
        if (!$execSuccess) {
            return ['errors' => [t('sending_domains', 'While generating the private key, exec failed with: {fail}', [
                '{fail}' => t('sending_domains', 'Unknown error, most probably cannot exec the openssl command!'),
            ])]];
        }
        if (!is_file($tempStorage . '/' . $privateKey)) {
            return ['errors' => [t('sending_domains', 'Unable to check the private key file.')]];
        }

        // public key
        exec(sprintf('cd %s && /usr/bin/openssl rsa -in %s -out %s -pubout -outform PEM > /dev/null 2>&1', escapeshellarg($tempStorage), escapeshellarg($privateKey), escapeshellarg($publicKey)), $output, $return);
        if ((int)$return != 0) {
            return ['errors' => [t('sending_domains', 'While generating the public key, exec failed with: {fail}', [
                '{fail}' => t('sending_domains', 'Unknown error, most probably cannot exec the openssl command!'),
            ])]];
        }
        if (!is_file($tempStorage . '/' . $publicKey)) {
            return ['errors' => [t('sending_domains', 'Unable to check the public key file.')]];
        }

        $dkim_private_key = file_get_contents($tempStorage . '/' . $privateKey);
        $dkim_public_key  = file_get_contents($tempStorage . '/' . $publicKey);

        unlink($tempStorage . '/' . $privateKey);
        unlink($tempStorage . '/' . $publicKey);

        return ['errors' => [], 'private_key' => $dkim_private_key, 'public_key' => $dkim_public_key];
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public static function cleanDkimKey(string $key): string
    {
        $key = (string)str_replace([
            '-----BEGIN PUBLIC KEY-----',
            '-----END PUBLIC KEY-----',
            '-----BEGIN RSA PRIVATE KEY-----', // PKCS#1
            '-----END RSA PRIVATE KEY-----', // PKCS#1
            '-----BEGIN PRIVATE KEY-----', // PKCS#8
            '-----END PRIVATE KEY-----', // PKCS#8
        ], '', $key);
        return trim((string)preg_replace('/\s+/', '', $key));
    }

    /**
     * @return string
     */
    public static function getDefaultDkimPrivateKey(): string
    {
        /** @var OptionSpfDkim $optionSpfDkim */
        $optionSpfDkim = container()->get(OptionSpfDkim::class);

        return $optionSpfDkim->getDkimPrivateKey();
    }

    /**
     * @return string
     */
    public static function getDefaultDkimPublicKey(): string
    {
        /** @var OptionSpfDkim $optionSpfDkim */
        $optionSpfDkim = container()->get(OptionSpfDkim::class);

        return $optionSpfDkim->getDkimPublicKey();
    }

    /**
     * @return string
     */
    public static function getDefaultSpfValue(): string
    {
        /** @var OptionSpfDkim $optionSpfDkim */
        $optionSpfDkim = container()->get(OptionSpfDkim::class);

        return $optionSpfDkim->getSpf();
    }

    /**
     * @return string
     */
    public static function getDefaultDmarcValue(): string
    {
        /** @var OptionSpfDkim $optionSpfDkim */
        $optionSpfDkim = container()->get(OptionSpfDkim::class);

        return $optionSpfDkim->getDmarc();
    }

    /**
     * @return string
     */
    public static function getDkimSelector(): string
    {
        return (string)app_param('email.custom.dkim.selector', 'mailer');
    }

    /**
     * @return string
     */
    public static function getDkimFullSelector(): string
    {
        return (string)app_param('email.custom.dkim.full_selector', 'mailer._domainkey');
    }
}
