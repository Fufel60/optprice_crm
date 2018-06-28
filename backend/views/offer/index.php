<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Офферы';
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];
$this->params['toolbar'] = [
    Html::a('<i class="fa fa-plus-circle"></i> Добавить', ['update', 'id' => 0], ['class' => 'btn btn-success']),
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
        'attribute' => 'search_adv',
        ],
        [
            'attribute' => 'search_marketplace',
        ],
        [
            'attribute' => 'search_china',
        ],
        [
            'attribute' => 'search_youtube',
        ],
        [
            'attribute' => 'search_tv',
        ],
        [
            'attribute' => 'search_coupon',
            'format'=>'text',
        ],
        [
            'attribute' => 'search_cra',
            'format'=>'text',
        ],
        [
            'attribute' => 'search_wholesale',
        ],
        [
            'attribute' => 'search_store',
        ],
        [
            'attribute' => 'search_rsja',
        ],
        [
            'attribute' => 'search_publer',
        ],
        [
            'attribute' => 'search_seo',
        ],
    ],
]);
echo '</div></div>';
