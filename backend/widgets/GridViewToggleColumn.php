<?php

namespace backend\widgets;

use Yii;
use yii\grid\DataColumn;
use yii\helpers\Html;

/**
 * Class GridViewToggleColumn
 * @package backend\widgets
 */
class GridViewToggleColumn extends DataColumn
{
    /**
     * @var string|callable
     */
    public $url;

    /**
     * @var array
     */
    public $headerOptions = [
        'width' => 50
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->view->registerJs("
        
            $('#{$this->grid->id} .toggle').click(function(e){
                e.preventDefault();

                var a = $(this);

                $.get(a.attr('href'), function(){
                    if (a.hasClass('label-danger'))
                    {
                        a.removeClass('label-danger').addClass('label-success');
                        a.find('i').removeClass('fa-ban').addClass('fa-check');
                    }
                    else
                    {
                        a.addClass('label-danger').removeClass('label-success');
                        a.find('i').addClass('fa-ban').removeClass('fa-check');
                    }
                });

                return false;
            });
        ");
    }

    /**
     * @inheritdoc
     */
    protected function renderFilterCellContent()
    {
        return Html::activeDropDownList($this->grid->filterModel, $this->attribute, [
            '0' => 'Нет',
            '1' => 'Да',
        ], [
            'prompt' => '...',
            'class' => 'form-control'
        ]);
    }

    /**
     * @param mixed $model
     * @param mixed $key
     * @param int $index
     * @return string|array
     */
    protected function getDataCellUrl($model, $key, $index)
    {
        if ($this->url !== null) {
            if (is_string($this->url)) {
                return $this->url;
            } else {
                return call_user_func($this->url, $model, $key, $index, $this);
            }
        } else {
            return ['toggle', 'id' => $model->id];
        }
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $value = $this->getDataCellValue($model, $key, $index);
        $url = $this->getDataCellUrl($model, $key, $index);

        if (!$value) {
            return '<center>' . Html::a('<i class="fa fa-ban"></i>', $url, ['class' => 'label label-danger toggle']) . '</center>';
        }

        return '<center>' . Html::a('<i class="fa fa-check"></i>', $url, ['class' => 'label label-success toggle']) . '</center>';
    }
}
