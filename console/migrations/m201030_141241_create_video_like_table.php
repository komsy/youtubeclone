<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video_like}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%videos}}`
 * - `{{%user}}`
 */
class m201030_141241_create_video_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video_like}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->string(16)->notNull(),
            'use_id' => $this->integer(11)->notNull(),
            'type' => $this->integer(1),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `video_id`
        $this->createIndex(
            '{{%idx-video_like-video_id}}',
            '{{%video_like}}',
            'video_id'
        );

        // add foreign key for table `{{%videos}}`
        $this->addForeignKey(
            '{{%fk-video_like-video_id}}',
            '{{%video_like}}',
            'video_id',
            '{{%videos}}',
            'video_id',
            'CASCADE'
        );

        // creates index for column `use_id`
        $this->createIndex(
            '{{%idx-video_like-use_id}}',
            '{{%video_like}}',
            'use_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-video_like-use_id}}',
            '{{%video_like}}',
            'use_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%videos}}`
        $this->dropForeignKey(
            '{{%fk-video_like-video_id}}',
            '{{%video_like}}'
        );

        // drops index for column `video_id`
        $this->dropIndex(
            '{{%idx-video_like-video_id}}',
            '{{%video_like}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-video_like-use_id}}',
            '{{%video_like}}'
        );

        // drops index for column `use_id`
        $this->dropIndex(
            '{{%idx-video_like-use_id}}',
            '{{%video_like}}'
        );

        $this->dropTable('{{%video_like}}');
    }
}
