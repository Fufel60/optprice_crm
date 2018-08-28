<?php

use yii\db\Migration;

class m180813_190157_change4_user_table extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'fk-user-dept_id-dept-id',
            'user',
            'dept_id',
            'dept',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m180813_190157_change4_user_table cannot be reverted.\n";

        return false;
    }
}
