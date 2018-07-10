<?php

use yii\db\Migration;

class m180701_122233_change_offer_table extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'fk-offer-user_id-user-id',
            'offer',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-offer-status_id-status-id',
            'offer',
            'status_id',
            'status',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addColumn('offer', 'product_id', $this->integer(11)->after('status_id'));

        $this->addForeignKey(
            'fk-offer-product_id-offer_product-id',
            'offer',
            'product_id',
            'offer_product',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m180701_122233_change_offer_table cannot be reverted.\n";

        return false;
    }
}
