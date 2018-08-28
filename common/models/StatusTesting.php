<?php
namespace common\models;

use yii\db\ActiveRecord;

class StatusTesting extends ActiveRecord
{
    const STATUS_GOOD = 8;
    const STATUS_NOGOOD = 9;
    const STATUS_CHANGED = 10;

    public static function tableName()
    {
        return '{{status_testing}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Статус тестинга',
        ];
    }

    public function rules()
    {
        return [
            ['name', 'string', 'max' => 255]
        ];
    }
}