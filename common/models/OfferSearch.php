<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * Class AreaSearch
 * @package common\models
 */
class OfferSearch extends Offer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status_id', 'integer']
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params = [])
    {
        $query = Offer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_ASC]]
        ]);

        if ($this->load(Yii::$app->request->get()) && $this->validate()) {
            $query->andFilterWhere(['like', 'status_id', $this->status_id]);
        }

        return $dataProvider;
    }
}
