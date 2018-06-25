<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180118_172501_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'type' => $this->integer(),
            'name' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'title' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->null(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
