<?php

namespace backend\controllers;

use Yii;

use backend\models\OrganizationCategory;
use backend\controllers\actions\IndexAction;
use backend\controllers\actions\DeleteAction;

class OrganizationCategoryController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'query' => OrganizationCategory::find()->andWhere(['>','depth',0])->orderBy(['lft' => SORT_ASC]),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => OrganizationCategory::className(),
            ],
        ];
    }
    
    public function actionUpdate($id) 
    {
        if ($id)
        {
            $model = OrganizationCategory::findOne($id);
            if (!$model) throw new NotFoundHttpException;
        }
        else
        {
            $model = new OrganizationCategory;
        }

        if ($model->load(Yii::$app->request->post()))
        {    
            if ($model->validate()) {
                $model->save();
                // если родительская категория изменена
                if ($model->parents(1)->one()->id != $model->parent_node) {
                    $new_parent = OrganizationCategory::findOne($model->parent_node);
                    $model->appendTo($new_parent);
                }
                    
                Yii::$app->session->addFlash('success', 'Данные сохранены');
                $this->goBack();
            }
        }
        else
        {
            Yii::$app->user->returnUrl = Yii::$app->request->referrer;
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
