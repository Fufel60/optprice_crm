<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Status
 * @package common\models
 *
 * @property string name
 */
class Status extends ActiveRecord
{
    public static function tableName()
    {
        return '{{status}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Статус оффера',
        ];
    }

    public function rules()
    {
        return [
            ['name', 'string', 'max' => 255]
        ];
    }
}
