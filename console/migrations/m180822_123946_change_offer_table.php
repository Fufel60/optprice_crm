<?php

use yii\db\Migration;

class m180822_123946_change_offer_table extends Migration
{
    public function up()
    {
        $this->addColumn('offer', 'product_price', $this->decimal(10,2)->after('product_name'));
    }

    public function down()
    {
        echo "m180822_123946_change_offer_table cannot be reverted.\n";

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
