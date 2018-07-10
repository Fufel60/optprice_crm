<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            'value' => function ($offer) {
                    return $offer->search_adv == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_marketplace',
            'value' => function ($offer) {
                    return $offer->search_marketplace == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_china',
            'value' => function ($offer) {
                    return $offer->search_china == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_youtube',
            'value' => function ($offer) {
                    return $offer->search_youtube == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_tv',
            'value' => function ($offer) {
                    return $offer->search_tv == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_coupon',
            'format'=>'text',
        ],
        [
            'attribute' => 'search_cra',
            'value' => function ($offer) {
                    return $offer->search_cra == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_wholesale',
            'value' => function ($offer) {
                    return $offer->search_wholesale == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_store',
            'value' => function ($offer) {
                    return $offer->search_store == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_rsja',
            'value' => function ($offer) {
                    return $offer->search_rsja == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_publer',
            'value' => function ($offer) {
                    return $offer->search_publer == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'search_seo',
            'value' => function ($offer) {
                    return $offer->search_seo == 1 ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'user_id',
            'value' => function ($offer) {
                    return $offer->user->name;
            }
        ],
    ],
]);
echo '</div></div>';
