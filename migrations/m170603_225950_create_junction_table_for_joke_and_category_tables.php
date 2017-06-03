<?php

use yii\db\Migration;

/**
 * Handles the creation of table `joke_category`.
 * Has foreign keys to the tables:
 *
 * - `joke`
 * - `category`
 */
class m170603_225950_create_junction_table_for_joke_and_category_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('joke_category', [
            'joke_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(joke_id, category_id)',
        ]);

        // creates index for column `joke_id`
        $this->createIndex(
            'idx-joke_category-joke_id',
            'joke_category',
            'joke_id'
        );

        // add foreign key for table `joke`
        $this->addForeignKey(
            'fk-joke_category-joke_id',
            'joke_category',
            'joke_id',
            'joke',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-joke_category-category_id',
            'joke_category',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-joke_category-category_id',
            'joke_category',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `joke`
        $this->dropForeignKey(
            'fk-joke_category-joke_id',
            'joke_category'
        );

        // drops index for column `joke_id`
        $this->dropIndex(
            'idx-joke_category-joke_id',
            'joke_category'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-joke_category-category_id',
            'joke_category'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-joke_category-category_id',
            'joke_category'
        );

        $this->dropTable('joke_category');
    }
}
