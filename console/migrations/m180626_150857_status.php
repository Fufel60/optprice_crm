<?php

use yii\db\Migration;

class m180626_150857_status extends Migration
{
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    public function down()
    {
        echo "m180626_150857_status cannot be reverted.\n";

        return false;
    }
}
