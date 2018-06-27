<?php

use yii\db\Migration;

class m180626_150338_dept extends Migration
{
    public function up()
    {
        $this->createTable('dept', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    public function down()
    {
        echo "m180626_150338_dept cannot be reverted.\n";

        return false;
    }

}
