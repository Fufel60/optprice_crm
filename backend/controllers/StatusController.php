<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Status;
use yii\data\ActiveDataProvider;

class StatusController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Status::find(),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return $this->render('index', [
            'dp' => $dataProvider,
        ]);
    }
}
