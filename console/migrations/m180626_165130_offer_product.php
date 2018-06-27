<?php

use yii\db\Migration;

class m180626_165130_offer_product extends Migration
{
    public function up()
    {
        $this->createTable('offer_product', [
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer(11),
            'product_name' => $this->string(255),
            'product_url' => $this->string(255),
        ]);
    }

    public function down()
    {
        echo "m180626_165130_offer_product cannot be reverted.\n";

        return false;
    }
}
