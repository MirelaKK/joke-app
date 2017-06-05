<?php

use yii\db\Migration;

class m170605_155928_adding_indices_in_joke_rating_and_category_tables extends Migration
{
    public function up()
    {
        //creating index for sort_key column in category table
        $this->createIndex(
            'idx-category-sort_key',
            'category',
            'sort_key'
        );

        //creating index for ip column in joke_rating table
        $this->createIndex(
            'idx-joke_rating-ip',
            'joke_rating',
            'ip'
        );
    }

    public function down()
    {
        // drops index for sort_key column in category table
        $this->dropIndex(
            'idx-category-sort_key',
            'category'
        );

        // drops index for ip column in joke_rating table
        $this->dropIndex(
            'idx-joke_rating-ip',
            'joke_rating'
        );
    }
}
