<?php
namespace backend\models;

class OrganizationCategory extends \common\models\OrganizationCategory {
    
    public $parent_node;
    
    public function afterFind() {
        
        parent::afterFind();

        $parent = $this->parents(1)->one();
        $this->parent_node = $parent ? $parent->id : 0;
    }
    
    public function rules() {
        $rules = parent::rules();
        $rules[] = [
            'parent_node','nestedSetValidator'
        ];
        return $rules;
    }
    
    public function nestedSetValidator ($attribute, $params) {
        
        $new_parent = self::findOne($this->$attribute);
        
        if ($new_parent->lft > $this->lft && $new_parent->rgt < $this->rgt) {
             return $this->addError('parent_node', 'Невозможно переместить категорию в дочернюю подкатегорию');
        }
    }
}