<?php
namespace common\models;

use yii\db\ActiveRecord;
use creocoder\nestedsets\NestedSetsBehavior;

class AddressCategory extends ActiveRecord {
    
    public $move_to_node;
    
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'createdAtAttribute' => 'created_at',
                'createdAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                //'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function attributeLabels() {
        return [
            'address' => 'Адрес',
            'move_to_node' => 'Переместить'
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
    
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
    
    public function rules()
    {
        return [
            [['address',], 'trim'],
            ['address', 'required'],
        ];
    }
}
