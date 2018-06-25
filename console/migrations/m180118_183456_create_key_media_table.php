<?php

use yii\db\Migration;

/**
 * Handles the creation of table `key_media`.
 */
class m180118_183456_create_key_media_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addForeignKey(
            'fk-media-post_id-post-id',
            'media',
            'post_id',
            'post',
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
            'fk-media-post_id-post-id',
            'media'
        );
    }
}
