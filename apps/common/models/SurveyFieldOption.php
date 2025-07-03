<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * SurveyFieldOption
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.7.8
 */

/**
 * This is the model class for table "{{survey_field_option}}".
 *
 * The followings are the available columns in table '{{survey_field_option}}':
 * @property integer|null $option_id
 * @property integer|null $field_id
 * @property string $name
 * @property string $value
 * @property string $is_default
 * @property string|CDbExpression $date_added
 * @property string|CDbExpression $last_updated
 *
 * The followings are the available model relations:
 * @property SurveyField $field
 */
class SurveyFieldOption extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return '{{survey_field_option}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            ['name, value', 'required'],
            ['name', 'length', 'max'=>100],
            ['value', 'length', 'max'=>255],
            ['is_default', 'in', 'range' => array_keys($this->getIsDefaultOptionsArray()), 'allowEmpty' => true],
        ];

        return CMap::mergeArray($rules, parent::rules());
    }

    /**
     * @return array
     */
    public function relations()
    {
        $relations = [
            'field' => [self::BELONGS_TO, SurveyField::class, 'field_id'],
        ];

        return CMap::mergeArray($relations, parent::relations());
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        $labels = [
            'option_id'     => t('survey_fields', 'Option'),
            'field_id'      => t('survey_fields', 'Field'),
            'name'          => t('survey_fields', 'Name'),
            'value'         => t('survey_fields', 'Value'),
            'is_default'    => t('survey_fields', 'Is default'),
        ];

        return CMap::mergeArray($labels, parent::attributeLabels());
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SurveyFieldOption the static model class
     */
    public static function model($className=self::class)
    {
        /** @var SurveyFieldOption $model */
        $model = parent::model($className);

        return $model;
    }

    /**
     * @return array
     */
    public function attributeHelpTexts()
    {
        $texts = [
            'value' => null,
        ];

        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }

    /**
     * @return array
     */
    public function getIsDefaultOptionsArray(): array
    {
        return [
            self::TEXT_NO    => t('app', 'No'),
            self::TEXT_YES   => t('app', 'Yes'),
        ];
    }
}
