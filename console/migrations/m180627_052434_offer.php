<?php

use yii\db\Migration;

class m180627_052434_offer extends Migration
{
    public function up()
    {
        $this->createTable('offer', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'status_id' => $this->integer(11),
            'search_tv' => $this->string(255),
            'search_coupon' => $this->string(255),
            'search_cra' => $this->string(255),
            'search_wholesale' => $this->string(255),
            'search_store' => $this->string(255),
            'search_rsja' => $this->string(255),
            'search_publer' => $this->string(255),
            'search_seo' => $this->string(255),
            'analytics_google_trends' => $this->integer(100),
            'analytics_wordstat' => $this->integer(10),
            'analytics_cpa' => $this->integer(1),
            'analytics_store' => $this->integer(10),
            'analytics_wow' => $this->integer(10),
            'analytics_season' => $this->integer(2),
            'analytics_offline' => $this->integer(2),
            'analytics_potential' => $this->integer(10),
            'search_priority' => $this->string(255),
            'start_search_msk' => $this->string(255),
            'start_search_online' => $this->string(255),
            'start_search_china' => $this->string(255),
            'start_comment' => $this->string(500),
            'start_result' => $this->string(255),
            'info' => $this->string(255),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->null(),
        ]);
    }

    public function down()
    {
        echo "m180627_052434_offer cannot be reverted.\n";

        return false;
    }
}
