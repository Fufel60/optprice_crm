<?php

namespace backend\controllers;

use common\models\Department;
use Yii;
use common\models\Offer;
use common\models\OfferSearch;
use common\models\User;
use common\models\Status;
use yii\web\Controller;

class OfferController extends Controller
{
    /**
     * @var string
     */
    public $searchModelClass;

    public function actionIndex()
    {
        $searchModel = new OfferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dp' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id)
    {
        if ($id) {
            $offer = Offer::findOne($id);
        }
        else {
            $offer = new Offer();
        }
        $offer->user_id = Yii::$app->user->getId();

        if ($offer->load(Yii::$app->request->post()) && $offer->validate()) {

            if ($offer->save()) {

                // Отсылаем ВСЕМ уведомление о новом товаре
                if ($offer->status_id == Status::STATUS_NEW) {
                    foreach (User::find()->all() as $user) {
                        Yii::$app->mailer->compose(
                            [
                                'html' => 'views/offer-status',
                            ],
                            [
                                'offerId' => $offer->id,
                                'offerStatus' => $offer->status_id,
                                'offerProduct' => $offer->product_name
                            ])
                            ->setFrom('zakaz@optprice24.ru')
                            ->setTo($user->email)
                            ->setSubject('Новый оффер')
                            ->send();
                    }
                }

                if ($offer->statusChanged) {
                    // Статус изменился c "Новый" на "Тест", отсылаем уведомление отделу арбитража
                    if ($offer->status_id == Status::STATUS_TESTING) {
                        foreach (User::find()->where(['dept_id' => Department::DEPARTMENT_ARBITR])->all() as $user) {
                            Yii::$app->mailer->compose(
                                [
                                    'html' => 'views/offer-status',
                                ],
                                [
                                    'offerId' => $id,
                                    'offerStatus' => $offer->status_id,
                                    'offerProduct' => $offer->product_name
                                ])
                                ->setFrom('zakaz@optprice24.ru')
                                ->setTo($user->email)
                                ->setSubject('Отдел арбитража: cмена статуса оффера')
                                ->send();
                        }
                    }

                    // Статус изменился с "Тест" на "Поиск", отсылаем уведомление товарному отделу
                    if ($offer->status_id == Status::STATUS_SEARCH) {
                        foreach (User::find()->where(['dept_id' => Department::DEPARTMENT_PRODUCT])->all() as $user) {
                            Yii::$app->mailer->compose(
                                [
                                    'html' => 'views/offer-status',
                                ],
                                [
                                    'offerId' => $id,
                                    'offerStatus' => $offer->status_id,
                                    'offerProduct' => $offer->product_name
                                ])
                                ->setFrom('zakaz@optprice24.ru')
                                ->setTo($user->email)
                                ->setSubject('Товарный отдел: cмена статуса оффера')
                                ->send();
                        }
                    }

                    // Статус изменился c "Поиск" на "Товар найден", отсылаем уведомление отделу арбитража
                    if ($offer->status_id == Status::STATUS_FOUNDED) {
                        foreach (User::find()->where(['dept_id' => Department::DEPARTMENT_ARBITR])->all() as $user) {
                            Yii::$app->mailer->compose(
                                [
                                    'html' => 'views/offer-status',
                                ],
                                [
                                    'offerId' => $id,
                                    'offerStatus' => $offer->status_id,
                                    'offerProduct' => $offer->product_name,
                                ])
                                ->setFrom('zakaz@optprice24.ru')
                                ->setTo($user->email)
                                ->setSubject('Отдел арбитража: cмена статуса оффера')
                                ->send();
                        }
                    }
                }

                // Статус изменился с "Товар найден" на "Запуск", отсылаем уведомление товарному отделу
                if ($offer->status_id == Status::STATUS_START) {
                    foreach (User::find()->where(['dept_id' => Department::DEPARTMENT_PRODUCT])->all() as $user) {
                        Yii::$app->mailer->compose(
                            [
                                'html' => 'views/offer-status',
                            ],
                            [
                                'offerId' => $id,
                                'offerStatus' => $offer->status_id,
                                'offerProduct' => $offer->product_name,
                            ])
                            ->setFrom('zakaz@optprice24.ru')
                            ->setTo($user->email)
                            ->setSubject('Товарный отдел: cмена статуса оффера')
                            ->send();
                    }
                }

                // Статус изменился на "Отклонен", отсылаем уведомление отделу арбитража
                if ($offer->status_id == Status::STATUS_REJECTED) {
                    foreach (User::find()->where(['dept_id' => Department::DEPARTMENT_ARBITR])->all() as $user) {
                        Yii::$app->mailer->compose(
                            [
                                'html' => 'views/offer-status',
                            ],
                            [
                                'offerId' => $id,
                                'offerStatus' => $offer->status_id,
                                'offerProduct' => $offer->product_name,
                            ])
                            ->setFrom('zakaz@optprice24.ru')
                            ->setTo($user->email)
                            ->setSubject('Отдел арбитража: cмена статуса оффера')
                            ->send();
                    }
                }

                return $this->redirect(['/offer/index']);
            }
        }

        return $this->render('update', [
            'offer' => $offer,
        ]);
    }

    public function actionDelete($id)
    {
        $offer = Offer::findOne($id);
        if ($offer->delete()) {
            return $this->redirect(['/offer/index']);
        }
    }
}