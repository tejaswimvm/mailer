<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * DeleteTransactionalEmailsCommand
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.4.9
 */

class DeleteTransactionalEmailsCommand extends ConsoleCommand
{
    /**
     * @param string $time
     * @return int
     * @throws CDbException
     */
    public function actionIndex($time)
    {
        if (empty($time)) {
            echo 'Please set the time option using the --time option, i.e: --time="-1 month"' . "\n";
            return 0;
        }

        $timestamp = (int)strtotime($time);
        $date      = date('Y-m-d H:i:s', $timestamp);

        $this->stdout(sprintf('Deleting transactional emails that are older than "%s" date', $date));

        $criteria = new CDbCriteria();
        $criteria->addCondition('date_added < :dt');
        $criteria->params[':dt'] = $date;

        $count = TransactionalEmail::model()->count($criteria);

        if (empty($count)) {
            $this->stdout('Nothing to delete, aborting!');
            return 0;
        }

        $this->stdout(sprintf('This action will delete %d transactional emails.', $count));

        $start = microtime(true);

        while (true) {
            $criteria = new CDbCriteria();
            $criteria->addCondition('date_added < :dt');
            $criteria->params[':dt'] = $date;
            $criteria->limit = 300;
            $emails = TransactionalEmail::model()->findAll($criteria);

            if (empty($emails)) {
                break;
            }

            foreach ($emails as $email) {
                $email->delete();
            }
        }

        $timeTook  = round(microtime(true) - $start, 4);

        $this->stdout(sprintf('DONE, took %s seconds!', $timeTook));
        return 0;
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        $cmd = $this->getCommandRunner()->getScriptName() . ' ' . $this->getName();

        $help  = sprintf('command: %s --time=EXPRESSION', $cmd) . "\n";

        return $help . ('--time=EXPRESSION where EXPRESSION can be any expression parsable by php\'s strtotime function. ie: --time="-1 month".' . "\n");
    }
}
