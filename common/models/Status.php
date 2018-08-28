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
    // Статус "Новый"
    const STATUS_NEW = 1;

    // Статус "Тест"
    const STATUS_TESTING = 2;

    // Статус "Поиск"
    const STATUS_SEARCH = 3;

    // Статус "Товар найден"
    const STATUS_FOUNDED = 4;

    // Статус "Запуск"
    const STATUS_START = 5;

    // Статус "Отклонен"
    const STATUS_REJECTED = 6;

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
