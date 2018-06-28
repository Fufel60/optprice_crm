<?php
namespace common\models;

use yii\db\ActiveRecord;

class Department extends ActiveRecord
{
    public static function tableName()
    {
        return '{{dept}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Отдел',
        ];
    }
}