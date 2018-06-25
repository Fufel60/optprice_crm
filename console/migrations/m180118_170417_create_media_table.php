<?php

use yii\db\Migration;

/**
 * Handles the creation of table `media`.
 */
class m180118_170417_create_media_table extends Migration
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

        $this->createTable('media', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'type' => $this->integer(),
            'path' => $this->string(255)->notNull(),
            'title' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('media');
    }
}
