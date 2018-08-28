<?php

namespace common\models;

use yii\grid\DataColumn;

class TotalColumn extends DataColumn
{
    private $total = 0;

    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        $totalArray[] =  $value;
        $this->total = array_sum($totalArray);
        return $value;
    }

    protected function renderFooterCellContent()
    {
        return 'Итого товаров: <b>' . $this->grid->formatter->format($this->total, $this->format) . '</b>';
    }
}
