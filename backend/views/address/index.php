<?php

use yii\grid\CheckboxColumn;
use yii\grid\GridView;
use yii\helpers\Html;

use backend\widgets\GridViewButtonDelete;

$this->title = 'Категории';

$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];
$this->params['toolbar'] = [
    Html::a('<i class="fa fa-plus-circle"></i> Добавить', ['update', 'id' => 0], ['class' => 'btn btn-success']),
    GridViewButtonDelete::widget(),
];
?>
<div class="box box-primary">
    <div class="box-body">
        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'headerOptions' => [
                        'width' => 50,
                    ],
                    'class' => CheckboxColumn::className(),
                ],
                [
                    'attribute' => 'address',
                    'format' => 'raw',
                    'value' => function ($model) {
                                return Html::a(str_repeat("--", $model->depth - 1).' '.$model->name, [
                                    'update',
                                    'id' => $model->id
                                ]);
                            },
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d-m-Y H:i']
                ]
            ],
        ])?>
    </div>
</div>