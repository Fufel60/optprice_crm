<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Offer;
use common\models\Status;
use yii\widgets\ActiveForm;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

$this->title = ($offer->isNewRecord ? 'Добавление оффера' : 'Редактирование оффера №' . $offer->id);
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
                <h3>Товары</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'product_name')->textInput([
                    'disabled' => $offer->status_id == 6
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Статус оффера</h3>
                <?= $form->field($offer, 'status_id')->dropDownList(
                    ArrayHelper::map(
                        Status::find()->all(),
                        'id',
                        'name'
                    ),
                    [
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
                <?= $form->field($offer, 'product_price')->textInput([
                    'disabled' => $offer->status_id != 4
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Методы поиска</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'search_adv')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'search_cra')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'search_marketplace')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'search_wholesale')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'search_china')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'search_store')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'search_youtube')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'search_rsja')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'search_tv')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'search_publer')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'search_coupon')->textInput(
                    [
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'search_seo')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    ['disabled' => $offer->status_id == 6]
                );
                ?>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-6">
                <?= "<label class='control-label'>Сотрудник</label>: " . $offer->user->name; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Методы аналитики</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_google_trends')->input(
                    'number',
                    [
                        'min' => 1,
                        'max' => 100,
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_wow')->input(
                    'number',
                    [
                        'min' => 1,
                        'max' => 10,
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_wordstat')->input(
                    'number',
                    [
                        'min' => 1,
                        'max' => 10,
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_season')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    [
                    'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_cpa')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    [
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_offline')->dropDownList([
                    Offer::STATUS_YES => 'Да',
                    Offer::STATUS_NO => 'Нет',
                ],
                    [
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_store')->input(
                    'number',
                    [
                        'min' => 1,
                        'max' => 10,
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($offer, 'analytics_potential')->input(
                    'number',
                    [
                        'min' => 1,
                        'max' => 10,
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'start_comment')->textarea(
                    [
                        'rows' => 9,
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($offer, 'search_priority')->textInput(
                            [
                                'disabled' => $offer->status_id == 6
                            ]
                        );
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($offer, 'start_search_msk')->textInput(
                            [
                                'disabled' => $offer->status_id == 6
                            ]
                        );
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($offer, 'start_search_china')->textInput(
                            [
                                'disabled' => $offer->status_id == 6
                            ]
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'start_search_online')->textInput(
                    [
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($offer, 'info')->textInput(
                    [
                        'disabled' => $offer->status_id == 6
                    ]
                );
                ?>
            </div>
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
