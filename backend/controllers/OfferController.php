<?php

namespace backend\controllers;

use Yii;
use common\models\Offer;
use yii\web\Controller;
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

    public function actionUpdate($id)
    {
        if ($id) {
            $offer = Offer::findOne($id);
        }
        else {
            $offer = new Offer();
        }

        if ($offer->load(Yii::$app->request->post()) && $offer->validate()) {
            if ($offer->save()) {
                return $this->redirect(['/offer/index']);
            }
        }

        return $this->render('update', [
            'offer' => $offer,
        ]);
    }
}