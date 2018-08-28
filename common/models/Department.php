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
    // Отдел арбитража
    const DEPARTMENT_ARBITR = 2;

    // Товарный отдел
    const DEPARTMENT_PRODUCT = 4;

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