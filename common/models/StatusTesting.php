<?php
namespace common\models;

use yii\db\ActiveRecord;

class StatusTesting extends ActiveRecord
{
    // Статус "зашел"
    const STATUS_GOOD = 8;
    // Статус "не зашел"
    const STATUS_NOGOOD = 9;
    // Статус "передумал"
    const STATUS_CHANGED = 10;

    const STATUS_YES = 1;

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