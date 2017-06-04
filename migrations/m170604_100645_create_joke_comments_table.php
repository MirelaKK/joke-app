<?php

use yii\db\Migration;

/**
 * Handles the creation of table `joke_comments`.
 */
class m170604_100645_create_joke_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('joke_comments', [
            'id' => $this->primaryKey(11),
            'joke_id' => $this->integer(11)->notNull(),
            'submitter_name' => $this->string(50)->notNull(),
            'joke_comment' => $this->text()->notNull(),
            'submit_date' => $this->datetime()->notNull(),
            'active'=> $this->integer(1)->notNull()
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-joke_comments-joke_id',
            'joke_comments',
            'joke_id',
            'joke',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('joke_comments');
    }
}
