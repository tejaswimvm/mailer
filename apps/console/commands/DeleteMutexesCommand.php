<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * DeleteMutexesCommand
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.4.4
 */

class DeleteMutexesCommand extends ConsoleCommand
{
    /**
     * @return int
     */
    public function actionIndex()
    {
        $folderName   = (string)Yii::getPathOfAlias('common.runtime.mutex');
        $days         = mutex()->ttl + 3600; // 3 days and one hour for padding
        $now          = time();
        $allFiles     = 0;
        $deletedFiles = 0;

        if (!file_exists($folderName) || !is_dir($folderName)) {
            return 0;
        }

        foreach (new DirectoryIterator($folderName) as $fileInfo) {
            if ($fileInfo->isDot() || !$fileInfo->isFile()) {
                continue;
            }
            $allFiles++;
            if (($now - $fileInfo->getCTime()) >= $days) {
                $this->stdout('Deleting: ' . $fileInfo->getRealPath());
                unlink((string)$fileInfo->getRealPath());
                $deletedFiles++;
            }
        }

        $this->stdout('Deleted ' . $deletedFiles . ' out of ' . $allFiles . ' mutex files!');

        return 0;
    }
}
