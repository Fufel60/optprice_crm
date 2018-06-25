<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m171109_121831_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'root_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'title' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
