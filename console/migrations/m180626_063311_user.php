<?php

use yii\db\Migration;

class m180626_063311_user extends Migration
{
    public function up()
    {
        $this->createTable('user',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'email' => $this->string(80),
            'dept_id' => $this->integer(11),
        ]);
    }

    public function down()
    {
        echo "m180626_063311_user cannot be reverted.\n";

        return false;
    }
}
