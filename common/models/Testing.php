<?php
namespace common\models;

use yii\db\ActiveRecord;

class Testing extends ActiveRecord
{
    public $count_test;

    public static function tableName()
    {
        return '{{testing}}';
    }

    public function attributeLabels()
    {
        return [
            'product_id' => 'Запущенный оффер',
            'status_id' => 'Результат теста',
            'user_id' => 'Сотрудник',
            'comment' => 'Комментарии',
            'instagram' => 'Источник - Инстаграм',
            'mt' => 'Источник - МТ',
            'rsja' => 'Источник - РСЯ',
            'vk' => 'Источник - Вконтакте',
            'price' => 'Цена',
            'search_result' => 'Результат поиска',
            'fail_comment' => 'Почему не нашли',
            'start_condition' => 'Условия запуска оффера',
            'created_at' => 'Дата запуска теста',
            'cpa' => 'Добавлен в CPA'
        ];
    }

    public function rules()
    {
        return [
            [
                ['comment', 'instagram', 'mt', 'rsja', 'vk', 'search_result', 'fail_comment', 'start_condition'], 'string', 'max' => 255
            ],
            [
                ['user_id', 'status_id', 'price'], 'integer'
            ],
            [
                'product_id', 'required'
            ]
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Offer::className(), ['id' => 'product_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(StatusTesting::className(), ['id' => 'status_id']);
    }
}