<?php

use yii\db\Migration;

/**
 * Handles the creation of table `testing`.
 */
class m180827_120322_create_testing_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('testing', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'status_id' => $this->integer(11),
            'comment' => $this->string(500),
            'instagram' => $this->string(255),
            'mt' => $this->string(255),
            'rsja' => $this->string(255),
            'vk' => $this->string(255),
            'price' => $this->decimal(10,2),
            'search_result' => $this->string(255),
            'fail_comment' => $this->string(255),
            'start_condition' => $this->string(255),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->addForeignKey(
            'fk-testing-user_id-user-id',
            'testing',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-testing-product_id-offer-id',
            'testing',
            'product_id',
            'offer',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-testing-status_id-status_testing-id',
            'testing',
            'status_id',
            'status_testing',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('testing');
    }
}
