<?php

use yii\db\Migration;

class m180828_083324_change_testing_table extends Migration
{
    public function up()
    {
        $this->addColumn('testing', 'cpa', $this->boolean()->after('search_result'));
    }

    public function down()
    {
        echo "m180828_083324_change_testing_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
