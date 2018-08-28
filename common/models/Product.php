<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Product
 * @package common\models
 *
 * @property integer $offer_id
 * @property string $product_name
 * @property string $product_url
 */
class Product extends ActiveRecord
{
    public static function tableName()
    {
        return '{{offer_product}}';
    }

    public function attributeLabels()
    {
        return [
            'product_name' => 'Наименование товара',
            'product_url' => 'Ссылка URL',
        ];
    }

    public function rules()
    {
        return [
            [
                'product_name', 'required'
            ],
            [
                ['product_name', 'product_url'], 'string',
            ]
        ];
    }
}
