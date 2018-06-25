<?php

use yii\db\Migration;

class m180118_163618_change_category_table extends Migration
{
    public function up()
    {
        $this->renameColumn('{{category}}','root_id','parent_id');
    }

    public function down()
    {
        $this->renameColumn('{{category}}','parent_id','root_id');
    }
}
