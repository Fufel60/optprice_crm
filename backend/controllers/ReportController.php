<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\TestingSearch;
use common\models\CpaSearch;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new TestingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $CpaSearchModel = new CpaSearch();
        $CpaDataProvider = $CpaSearchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'CpaDataProvider' => $CpaDataProvider,
            'CpaSearchModel' => $CpaSearchModel,
        ]);
    }
}