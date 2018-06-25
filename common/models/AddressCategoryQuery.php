<?php
namespace common\models;

use creocoder\nestedsets\NestedSetsQueryBehavior;

class AddressCategoryQuery extends \yii\db\ActiveQuery
{
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }
}