<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * Class AreaSearch
 * @package common\models
 */
class CpaSearch extends Testing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['cpa'], 'integer'
            ],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params = [])
    {
        $query = Testing::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_ASC]],
            'pagination' => false
        ]);

        if ($this->load(Yii::$app->request->get()) && $this->validate()) {
            $query->andFilterWhere(['like', 'cpa', $this->cpa]);
        }

        return $dataProvider;
    }
}