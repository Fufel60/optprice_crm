<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use yii\data\ActiveDataProvider;

class UserController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return $this->render('index', [
            'dp' => $dataProvider,
        ]);
    }
}