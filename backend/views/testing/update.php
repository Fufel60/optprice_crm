<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Offer;
use common\models\StatusTesting;
use yii\widgets\ActiveForm;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = ($test->isNewRecord ? 'Добавление теста' : 'Редактирование теста №' . $test->id);
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
                <h3>Новый тест</h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($test, 'user_id')->dropDownList(
                    ArrayHelper::map(
                        User::find()->all(),
                        'id',
                        'name'
                    )
                );
                ?>
                <?= $form->field($test, 'product_id')->dropDownList(
                    ArrayHelper::map(
                        Offer::find()->all(),
                        'id',
                        'product_name'
                    )
                );
                ?>
                <?= $form->field($test, 'status_id')->dropDownList(
                    ArrayHelper::map(
                        StatusTesting::find()->all(),
                        'id',
                        'name'
                    )
                );
                ?>
                <?= $form->field($test, 'instagram'); ?>
                <?= $form->field($test, 'mt'); ?>
                <?= $form->field($test, 'rsja'); ?>
                <?= $form->field($test, 'vk'); ?>
                <?= $form->field($test, 'price'); ?>
                <?= $form->field($test, 'search_result'); ?>
                <?= $form->field($test, 'fail_comment'); ?>
                <?= $form->field($test, 'start_condition'); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($test, 'comment')->textarea(['rows' => 20]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

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
