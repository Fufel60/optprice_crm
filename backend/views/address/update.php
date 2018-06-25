<?php

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Adress;

$this->title = ($model->isNewRecord ? "Добавление" : "Редактирование")." адреса";
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [
    [
        'label' => 'Адреса',
        'url' => ['index'],
    ],
    $this->title
];

$addresses = Adress::find()->orderBy('lft ASC')->all();

?>
<div class="box box-primary">
    <div class="box-body">
<?php
    $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]);
    
    echo $form->field($model, 'address')->textInput();
    
    echo Html::activeDropDownList($model, 'parent_node', ArrayHelper::map($addresses, 'id', function($model) {
                                    return str_repeat('-', $model->depth).' '.$model->name;
                               }));

?>
    </div>
    <div class="box-footer">
<?php
    echo Html::submitButton('<i class="fa fa-save"></i> Сохранить', ['class' => 'btn btn-success']);
    $form->end();
?>
    </div>
</div>
