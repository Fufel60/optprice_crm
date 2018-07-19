<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Department;
use yii\widgets\ActiveForm;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = ($product->isNewRecord ? 'Добавление товара' : 'Редактирование товара №' . $product->id);
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];

$form = ActiveForm::begin([
    'enableClientValidation' => false,
]);
?>
<div class="box box-primary" xmlns="http://www.w3.org/1999/html">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($product, 'product_name'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($product, 'product_url'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= Html::submitButton("<i class='fa fa-save'></i> Сохранить", ['class' => 'btn btn-success']); ?>
            </div>
        </div>
    </div>
</div>

<?php
$form->end();
?>
