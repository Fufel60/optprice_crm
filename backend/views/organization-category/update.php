<?php

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\OrganizationCategory;

$this->title = ($model->isNewRecord ? "Добавление" : "Редактирование")." категории";
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [
    [
        'label' => 'Категории',
        'url' => ['index'],
    ],
    $this->title
];

$categories = OrganizationCategory::find()->orderBy('lft ASC')->all();

?>
<div class="box box-primary">
    <div class="box-body">
<?php

        $form = ActiveForm::begin([
            'enableClientValidation' => false,
        ]);
?>
        <?= $form->field($model, 'name')->textInput();?>
   
        <?= $form->field($model, 'parent_node')->dropDownList(
                ArrayHelper::map($categories, 'id', function($model) {
                    return str_repeat('-', $model->depth).' '.$model->name;
                }),
                ['class' => 'form-control']
            );?>
    </div>
    <div class="box-footer">
<?php
    echo Html::submitButton('<i class="fa fa-save"></i> Сохранить', ['class' => 'btn btn-success']);
    $form->end();
?>
    </div>
</div>
