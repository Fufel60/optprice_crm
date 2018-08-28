<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * Class AreaSearch
 * @package common\models
 */
class TestingSearch extends Offer
{

    /**
     * @var string
     */
    public $created_at_start;

    /**
     * @var string
     */
    public $created_at_end;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['status_id'], 'integer'
            ],
            [
                [
                    'created_at_start', 'created_at_end', 'count_test',
                ],
                'safe'
            ],
            [
                ['created_at'], 'match', 'pattern' => '/^[\d.:]+ - [\d.:]+$/'
            ]
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
            if ($this->created_at) {
                $this->created_at_start = $this->getDateRange($this->created_at)['start'];
                $this->created_at_end = $this->getDateRange($this->created_at)['end'];

            }
            $query->andFilterWhere(['between', 'created_at', $this->created_at_start, $this->created_at_end]);
            $query->andFilterWhere(['like', 'status_id', $this->status_id]);
        }

        return $dataProvider;
    }

    private function getDateRange($dateRange)
    {
        preg_match('/^(.+) - (.+)$/', $dateRange, $matches);
        return [
            'start' => Yii::$app->formatter->asDate($matches[1], 'php:y-m-d'),
            'end' => Yii::$app->formatter->asDate($matches[2], 'php:y-m-d:23:59:59'),
        ];
    }
}