<?php

use yii\db\Migration;

class m180628_085344_add_columns_to_offer_table extends Migration
{
    public function up()
    {
        $this->addColumn('offer', 'search_adv', $this->string(255)->after('status_id'));
        $this->addColumn('offer', 'search_marketplace', $this->string(255)->after('search_adv'));
        $this->addColumn('offer', 'search_china', $this->string(255)->after('search_marketplace'));
        $this->addColumn('offer', 'search_youtube', $this->string(255)->after('search_china'));
    }

    public function down()
    {
        echo "m180628_085344_add_columns_to_offer_table cannot be reverted.\n";

        return false;
    }
}
