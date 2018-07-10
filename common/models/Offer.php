<?php
namespace common\models;

use yii\db\ActiveRecord;

class Offer extends ActiveRecord
{
    const STATUS_YES = 1;
    const STATUS_NO = 2;
    const START_RESULT_YES  = 'Зашел';
    const START_RESULT_NO = 'Не зашел';
    const START_RESULT_CHANGE = 'Передумал';

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
            'search_seo' => 'Поиск в Яндексе/гугле по ключевому запросу',
            'analytics_google_trends' => 'Google Тренды - популярность по 100 бальной шкале',
            'analytics_wordstat' => 'Вордстат - Динамика и спрос по шкале от 1 до 10',
            'analytics_cpa' => 'Есть ли в цпа-сетях?',
            'analytics_store' => 'Популярность в интернет магазинах (включая аналоги) от 1 до 10?',
            'analytics_wow' => 'Полезность/ВАУ эффект от 1 до 10?',
            'analytics_season' => 'Сезонный товар или нет?',
            'analytics_offline' => 'Продается в офлайне или нет?',
            'analytics_potential' => 'Оценка потенциала от 1 до 10?',
            'search_priority' => 'Приоритетный поиск',
            'start_search_msk' => 'Результат поиска МСК',
            'start_search_online' => 'Результат поиска онлайн',
            'start_search_china' => 'Результат поиска Китай',
            'start_comment' => 'Комментарий запуска',
            'start_result' => 'Результат запуска (Наш арбитраж)',
            'info' => 'Доп. информация',
        ];
    }

    public function rules()
    {
        return [
            [
               [
                   'search_coupon',
                   'analytics_google_trends',
                   'analytics_wordstat',
                   'analytics_store',
                   'start_search_online',
                   'analytics_wow',
                   'analytics_potential',
                   'search_priority',
                   'start_search_msk',
                   'start_search_china',
               ],
                'required'
            ],
            [
                [
                    'search_adv',
                    'status_id',
                    'user_id',
                    'product_id',
                    'analytics_cpa',
                    'analytics_season',
                    'analytics_offline',
                    'search_marketplace',
                    'search_china',
                    'search_youtube',
                    'search_tv',
                    'search_cra',
                    'search_wholesale',
                    'search_store',
                    'search_rsja',
                    'search_publer',
                    'search_seo',
                ],
                'integer'
            ],
            [
                [
                    'search_coupon',
                    'search_priority',
                    'start_search_msk',
                    'start_search_online',
                    'start_search_china',
                    'start_result',
                    'info',
                ],
                'string', 'max' => 255,
            ],
            [
                'start_comment', 'string', 'max' => 500
            ],
            [
                'analytics_google_trends', 'integer', 'max' => 100,
            ],
            [
                ['analytics_wordstat', 'analytics_store', 'analytics_wow', 'analytics_potential'], 'integer', 'max' => 10,
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}