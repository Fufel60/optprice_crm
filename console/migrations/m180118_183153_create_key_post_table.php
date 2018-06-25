<?php

use yii\db\Migration;

/**
 * Handles the creation of table `key_post`.
 */
class m180118_183153_create_key_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addForeignKey(
            'fk-post-category_id-category-id',
            'post',
            'category_id',
            'category',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-post-category_id-category-id',
            'post'
        );
    }
}
