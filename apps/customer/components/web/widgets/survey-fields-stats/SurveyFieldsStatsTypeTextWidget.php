<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

if (!class_exists('SurveyFieldsStatsTypeBaseWidget', false)) {
    require_once __DIR__ . '/SurveyFieldsStatsTypeBaseWidget.php';
}
/**
 * SurveyFieldsStatsTypeTextWidget
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.7.8
 */

class SurveyFieldsStatsTypeTextWidget extends SurveyFieldsStatsTypeBaseWidget
{
    /**
     * @return array
     */
    protected function getData(): array
    {
        $data = [];

        $survey = $this->survey;
        $field  = $this->field;

        if (empty($survey) || empty($field)) {
            return $data;
        }

        $respondersCount = SurveyResponder::model()->countByAttributes([
            'survey_id' => $survey->survey_id,
        ]);

        if (empty($respondersCount)) {
            return $data;
        }

        $criteria = new CDbCriteria();
        $criteria->select = 'COUNT(value) AS counter';
        $criteria->compare('field_id', $field->field_id);
        $criteria->addCondition('value != ""');
        $resultsCount = SurveyFieldValue::model()->count($criteria);

        $data[] = [
            'label'           => t('surveys', 'With response'),
            'data'            => $resultsCount,
            'count'           => $resultsCount,
            'count_formatted' => $resultsCount,
        ];

        $emptyResponsesCount = $respondersCount - $resultsCount;

        $data[] = [
            'label'           => t('surveys', 'Without response'),
            'data'            => $emptyResponsesCount,
            'count'           => $emptyResponsesCount,
            'count_formatted' => $emptyResponsesCount,
        ];

        return $data;
    }
}
