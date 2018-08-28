<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * Class Offer
 * @package common\models
 *
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $product_id
 * @property integer $search_adv
 * @property integer $search_marketplace
 * @property integer $search_china
 * @property integer $search_youtube
 * @property integer $search_tv
 * @property string $search_coupon
 * @property integer $search_cra
 * @property integer $search_wholesale
 * @property integer $search_store
 * @property integer $search_rsja
 * @property integer $search_publer
 * @property integer $search_seo
 * @property integer $analytics_google_trends
 * @property integer $analytics_wordstat
 * @property integer $analytics_cpa
 * @property integer $analytics_store
 * @property integer $analytics_wow
 * @property integer $analytics_season
 * @property integer $analytics_offline
 * @property integer $analytics_potential
 * @property string $search_priority
 * @property string $start_search_msk
 * @property string $start_search_online
 * @property string $start_search_china
 * @property string $start_comment
 * @property string $start_result
 * @property string $info
 * @property string $created_at
 * @property string $updated_at
 */
class Offer extends ActiveRecord
{
    const STATUS_YES = 1;
    const STATUS_NO = 2;
    const START_RESULT_YES  = 'Зашел';
    const START_RESULT_NO = 'Не зашел';
    const START_RESULT_CHANGE = 'Передумал';
    public $statusChanged;

    public static function tableName()
    {
        return '{{offer}}';
    }

    public function attributeLabels()
    {
        return [
            'user_id' => 'Сотрудник',
            'status_id' => 'Название статуса',
            'product_name' => 'Название',
            'product_price' => 'Стоимость найденного товара',
            'search_adv' => 'Реклама',
            'search_marketplace' => 'Площадки Европа/Америка',
            'search_china' => 'Китайские сайты',
            'search_youtube' => 'Ютуб обзоры',
            'search_tv' => 'Тв шоп',
            'search_coupon' => 'Купонные сайты',
            'search_cra' => 'CPA сети',
            'search_wholesale' => 'Оптовики',
            'search_store' => 'Интернет магазины',
            'search_rsja' => 'РСЯ',
            'search_publer' => 'Publer',
            'search_seo' => 'Поиск в Yandex/Google',
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
            'start_result' => 'Результат теста',
            'info' => 'Доп. информация',
            'created_at' => 'Дата',
        ];
    }

    public function rules()
    {
        return [
            [
               [
                   'user_id',
                   'product_name',
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
            [
                'product_price', 'number',
            ]
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getTestingStatus()
    {
        return $this->hasOne(Testing::className(), ['product_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (isset($this->oldAttributes['status_id']) && $this->status_id != $this->oldAttributes['status_id']) {
                $this->statusChanged = true;
                return true;
            }
            else {
                $this->statusChanged = false;
                return true;
            }
        }
        else return false;
    }
}