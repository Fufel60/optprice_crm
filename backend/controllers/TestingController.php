<?php

namespace backend\controllers;

use Yii;
use common\models\Testing;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class TestingController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Testing::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        if ($id) {
            $test = Testing::findOne($id);
        }
        else {
            $test = new Testing();
        }

        if ($test->load(Yii::$app->request->post()) && $test->validate()) {
            if ($test->save()) {
                return $this->redirect(['testing/index']);
            }
        }

        return $this->render('update', [
            'test' => $test,
        ]);
    }

    public function actionDelete($id)
    {
        $test = Testing::findOne($id);
        if ($test->delete()) {
            return $this->redirect(['testing/index']);
        }
    }
}