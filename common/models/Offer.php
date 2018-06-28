<?php
namespace common\models;

use yii\db\ActiveRecord;

class Offer extends ActiveRecord
{
    public static function tableName()
    {
        return '{{offer}}';
    }

    public function attributeLabels()
    {
        return [
            'user_id' => 'Сотрудник',
            'status_id' => 'Cтатус',
            'search_adv' => 'Реклама',
            'search_marketplace' => 'Eвропейские и американские площадки',
            'search_china' => 'Китайские сайты',
            'search_youtube' => 'Ютуб обзоры',
            'search_tv' => 'Тв шоп',
            'search_coupon' => 'Купонные сайты',
            'search_cra' => 'CPA сети',
            'search_wholesale' => 'Оптовики',
            'search_store' => 'Интернет магазины',
            'search_rsja' => 'РСЯ',
            'search_publer' => 'Publer',
            'search_seo' => 'Поиск в Яндексе/гугле по ключевому запросу'
        ];
    }
}