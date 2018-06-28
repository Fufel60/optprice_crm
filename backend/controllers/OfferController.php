<?php
namespace backend\controllers;

use yii\web\Controller;
use common\models\Offer;
use yii\data\ActiveDataProvider;

class OfferController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Offer::find()->where(['not', ['status_id' => null]]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', [
            'dp' => $dataProvider,
        ]);
    }
}