<?php

use yii\db\Migration;

class m180822_122541_change_offer_product_table extends Migration
{
    public function up()
    {
        $this->addColumn('offer_product', 'price', $this->decimal(10,2)->after('product_name'));
    }

    public function down()
    {
        echo "m180822_122541_change_offer_product_table cannot be reverted.\n";

        return false;
    }
}
