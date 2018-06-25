<?php
namespace console\controllers;

use Sunra\PhpSimple\HtmlDomParser;
use Yii;

use common\models\OrganizationCategory;

class PskovlineOrganizationCategoryParserController extends \yii\console\Controller {
    
    public function actionRun() {
        $root = OrganizationCategory::find()->roots()->one();       
        if (!$root) {
            $this->stdout("Создаем корневую категорию \n");
            $root = new OrganizationCategory(['name' => 'Корневая категория']);
            $root->makeRoot();
        }
        
        $this->parse('http://spravka.pskovlive.ru/companies/1', $root);
    }
    
    protected function parse($url, $model, &$counter = 1) 
    {
        $dom = HtmlDomParser::file_get_html($url);
        $elems = $dom->find('[id^=razdel_name]');
            
        if (!count($elems)) {
            return;
        }
        
        foreach ($elems as $elem) {
            $child_model = new OrganizationCategory(['name' => $elem->innertext]);
            $child_model->appendTo($model);
            
            $this->stdout("Сохранено " . $counter++ . " записей \n");

            $this->parse($elem->href,$child_model, $counter);
        }
    }
}
