<?php

use yii\db\Migration;

/**
 * Handles the creation of table `joke_rating`.
 */
class m170603_230438_create_joke_rating_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('joke_rating', [
            'id' => $this->primaryKey(11),
            'joke_id' => $this->integer(11)->notNull(),
            'date_of_rating' => $this->datetime()->notNull(),
            'ip' => $this->string(30)->notNull(),
            'joke_rating' => $this->double()->notNull()
        ]);

         // add foreign key for table `joke_rating`
        $this->addForeignKey(
            'fk-joke_rating-joke_id',
            'joke_rating',
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
        $this->dropTable('joke_rating');
    }
}
