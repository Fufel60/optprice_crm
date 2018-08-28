<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['offer/index']);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        
        if (!Yii::$app->user->isGuest) return $this->goHome();

        $model = new LoginForm;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            Yii::$app->user->login($model->user, $model->rememberMe ? 60*60*24*30 : 0);
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        $this->layout = 'login';
        return $this->render('login',[
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }
}
