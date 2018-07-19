<?php

namespace backend\controllers;

use Yii;
use common\models\Offer;
use common\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionUpdate($id, $offerid)
    {
        if ($id) {
            $product = Product::findOne($id);
        }
        else {
            $product = new Product();
        }

        if ($product->load(Yii::$app->request->post()) && $product->validate()) {
            $product->offer_id = $offerid;
            if ($product->save()) {
                $offer = Offer::findOne($offerid);
                $offer->product_id = $product->id;
                $offer->save();
                return $this->redirect(['/offer/update?id=' . $offerid]);
            }
        }

        return $this->render('update', [
           'product' => $product,
        ]);
    }
}