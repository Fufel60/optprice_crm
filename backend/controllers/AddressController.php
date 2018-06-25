<?php

namespace backend\controllers;

use common\models\Address;

use backend\controllers\actions\IndexAction;
use backend\controllers\actions\UpdateAction;
use backend\controllers\actions\DeleteAction;

class AddressController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'query' => Address::find()->orderBy(['lft' => SORT_ASC]),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Address::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Address::className(),
            ],
        ];
    }
}
