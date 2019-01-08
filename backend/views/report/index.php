<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use common\models\StatusTesting;
use yii\grid\GridView;
use common\models\Offer;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Статистика';
$this->params['header'] = $this->title;
?>
<div class='row'>
    <div class='col-md-12'>
    <div class='panel panel-primary'>
        <div class='table-order-nopanel'>
            <h3>Протестированные товары</h3>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'showFooter' => true,
                'filterModel' => $searchModel,
                'summary' => 'Итого товаров: <b>{totalCount}</b>',
                'columns' => [
                    [
                        'attribute' => 'created_at',
                        'format' => ['datetime', 'php:d.m.Y H:i'],
                        'filter' => DateRangePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'created_at',
                            'convertFormat' => true,
                            'pluginOptions' => [
                                'autoUpdateInput' => true,
                                'timePickerIncrement' => 30,
                                'locale' => [
                                    'format' => 'd.m.Y'
                                ]
                            ],
                            'options' => [
                                'class' => 'rangepicker'
                            ]
                        ]
                        ),
                    ],
                    [
                        'attribute' => 'status_id',
                        'value' => function ($offer) {
                            return $offer->status->name;
                        },
                        'filter' =>
                            Html::activeDropDownList($searchModel, 'status_id', [
                                StatusTesting::STATUS_GOOD => 'Зашел',
                                StatusTesting::STATUS_NOGOOD => 'Не зашел',
                                StatusTesting::STATUS_CHANGED => 'Передумал',

                            ], ['class'=>'form-control', 'prompt' => 'Все'])
                    ],
                    [
                        'attribute' => 'product_id',
                        'value' => function ($offer) {
                            return $offer->product->product_name;
                        }
                    ],
                    [
                        'attribute' => 'cpa',
                        'value' => function ($offer) {
                            return $offer->cpa == Offer::STATUS_YES ? 'Да' : 'Нет';
                        },
                        'filter' =>
                            Html::activeDropDownList($searchModel, 'cpa', [
                                Offer::STATUS_YES => 'Да',
                                Offer::STATUS_NO => 'Нет',

                            ], ['class'=>'form-control', 'prompt' => 'Все'])
                    ],
                ],
            ]);
            ?>
            </div>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-primary'>
            <div class='table-order-nopanel'>


            </div>
        </div>
    </div>
</div>
<?=
//TODO скрипт для выбора текущей даты
$this->registerJs(<<<JS
    $('.rangepicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY')).trigger('change');
    });

    $('.rangepicker').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('').trigger('change');
    });
JS
);
?>
