<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * This is the model class for table "{{customer_api_key_to_permission}}".
 *
 * The followings are the available columns in table '{{customer_api_key_to_permission}}':
 * @property integer $key_id
 * @property integer $permission_id
 */
class CustomerApiKeyToPermission extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return '{{customer_api_key_to_permission}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [];

        return CMap::mergeArray($rules, parent::rules());
    }

    /**
     * @return array
     */
    public function relations()
    {
        $relations = [];

        return CMap::mergeArray($relations, parent::relations());
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        $labels = [
            'key_id'        => t('api_keys', 'Key'),
            'permission_id' => t('api_keys', 'Permission'),
        ];

        return CMap::mergeArray($labels, parent::attributeLabels());
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CustomerApiKeyToPermission the static model class
     */
    public static function model($className=self::class)
    {
        return parent::model($className);
    }
}
