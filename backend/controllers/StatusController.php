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

    public function actionUpdate($id)
    {
        if ($id) {
            $status = Status::findOne($id);
        }
        else {
            $status = new Status();
        }

        if ($status->load(Yii::$app->request->post()) && $status->validate()) {
            if ($status->save()) {
                return $this->redirect(['/status/index']);
            }
        }

        return $this->render('update', [
           'status' => $status,
        ]);
    }

    public function actionDelete($id)
    {
        $status = Status::findOne($id);
        if ($status->delete()) {
            return $this->redirect(['/status/index']);
        }
    }
}
