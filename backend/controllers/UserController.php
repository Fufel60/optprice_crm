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

    public function actionUpdate($id)
    {
        if ($id) {
            $user = User::findOne($id);
        }
        else {
            $user = new User();
        }
        $password = $user->generatePassword();
        $user->setPassword($password);
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            if ($user->save()) {
                Yii::$app->mailer->compose(
                    'views/register/index',
                    ['password' => $password, 'login' => $user->email]
                )
                    ->setFrom('zakaz@optprice24.ru')
                    ->setTo($user->email)
                    ->setSubject('Регистрация в системе генерации офферов')
                    ->send();
                $this->redirect(['/user/index']);
            }
        }

        return $this->render('update', [
            'user' => $user,
        ]);
    }

    public function actionDelete($id)
    {
        $user = User::findOne($id);
        if ($user->delete()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
}