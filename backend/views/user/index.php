<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Сотрудники';
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];
$this->params['toolbar'] = [
    Html::a('<i class="fa fa-plus-circle"></i> Добавить сотрудника', ['update', 'id' => 0], ['class' => 'btn btn-success']),
];

echo "<div class='row'><div class='col-md-9'><br>";

echo GridView::widget([
    'dataProvider' => $dp,
    'showFooter' => true,
    'columns' => [
        [
            'attribute' => 'id',
        ],
        [
            'attribute' => 'name',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete} {link}',
            'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>',
                        $url = 'update?id=' . $model->id);
                },

            ],

        ],
    ],
]);
echo '</div></div>';
