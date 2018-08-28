<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\TestingSearch;
use yii\data\ActiveDataProvider;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new TestingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}