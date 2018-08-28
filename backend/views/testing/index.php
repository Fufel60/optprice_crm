<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Offer;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Тестинг';
$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];
$this->params['toolbar'] = [
    Html::a('<i class="fa fa-plus-circle"></i> Добавить тест', ['update', 'id' => 0], ['class' => 'btn btn-success']),
];
?>
<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-primary'>
            <div class='table-order-nopanel'>
                <br>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showFooter' => true,
                    'columns' => [
                        [
                            'attribute' => 'product_id',
                            'format' => 'raw',
                            'value' => function ($test) {
                                if (!empty($test->product->product_name)) {
                                    return $test->product->product_name;
                                }
                                else {
                                    return '';
                                }
                            }
                        ],
                        [
                            'attribute' => 'status_id',
                            'format' => 'raw',
                            'value' => function ($test) {
                                return !empty($test->status) ? $test->status->name : '';
                            }
                        ],
                        [
                            'attribute' => 'comment',
                            'format' => 'raw',
                            'headerOptions' => [
                                'width' => 50,
                                'style' => 'width: 6%'
                            ],
                        ],
                        [
                            'attribute' => 'instagram',
                        ],
                        [
                            'attribute' => 'mt',
                        ],
                        [
                            'attribute' => 'rsja',
                        ],
                        [
                            'attribute' => 'vk',
                        ],
                        [
                            'attribute' => 'price',
                            'value' => function ($test) {
                                return !empty($test->price) ? $test->price : '';
                            }
                        ],
                        [
                            'attribute' => 'search_result',
                        ],
                        [
                            'attribute' => 'fail_comment',
                        ],
                        [
                            'attribute' => 'start_condition',
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => function ($test) {
                                return !empty($test->user->name) ? $test->user->name : '';
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
