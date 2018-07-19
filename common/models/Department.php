<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Department
 * @package common\models
 *
 * @property string name
 */
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