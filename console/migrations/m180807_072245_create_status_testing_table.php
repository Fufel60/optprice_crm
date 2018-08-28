<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status_testing`.
 */
class m180807_072245_create_status_testing_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('status_testing', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('status_testing');
    }
}
