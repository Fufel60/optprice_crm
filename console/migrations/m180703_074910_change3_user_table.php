<?php

use yii\db\Migration;

class m180703_074910_change3_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'name', $this->string(255));
    }

    public function down()
    {
        echo "m180703_074910_change3_user_table cannot be reverted.\n";

        return false;
    }
}
