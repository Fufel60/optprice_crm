<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Офферы';
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];
$this->params['toolbar'] = [
    Html::a('<i class="fa fa-plus-circle"></i> Добавить оффер', ['update', 'id' => 0], ['class' => 'btn btn-success']),
];
?>
<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-primary'>
        <div class='table-order-nopanel'>
        <br>
        <?=
        GridView::widget([
            'dataProvider' => $dp,
            'filterModel' => $searchModel,
            'showFooter' => true,
            'columns' => [
                [
                    'attribute' => 'created_at',
                    'format' => ['datetime', 'php:d.m.Y'],
                    'contentOptions'=>['style'=>'width: 50px;']
                ],
                [
                    'attribute' => 'product_name',
                    'format' => 'raw',
                    'value' => function ($offer) {
                        return !empty($offer->product_name) ? $offer->product_name : '';
                    }
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
                    'attribute' => 'status_id',
                    'value' => function ($offer) {
                            return $offer->status->name;
                    },
                    'filter' =>
                        Html::activeDropDownList($searchModel, 'status_id', [
                            Status::STATUS_NEW => 'Новый',
                            Status::STATUS_TESTING => 'Тест',
                            Status::STATUS_SEARCH => 'Поиск',
                            Status::STATUS_FOUNDED => 'Товар найден',
                            Status::STATUS_START => 'Запуск',
                            Status::STATUS_REJECTED => 'Отклонен',

                        ], ['class'=>'form-control', 'prompt' => 'Все'])

                ],
                [
                    'attribute' => 'start_result',
                    'value' => function ($offer) {
                        return !empty($offer->testingStatus) ? $offer->testingStatus->status->name : '';
                    }
                ],
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function ($offer) {
                        return $offer->user->name;
                    }
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
        ?>
        </div>
            </div>
        </div>
</div>
