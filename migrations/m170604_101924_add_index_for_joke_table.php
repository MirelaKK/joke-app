<?php

use yii\db\Migration;

class m170604_101924_add_index_for_joke_table extends Migration
{
    public function up()
    {
        // index for approval_date column in table joke
        $this->createIndex(
            'idx-joke-approval_date',
            'joke',
            'approval_date'
        );
        // index for admin_id column in table joke
        $this->createIndex(
            'idx-joke-admin_id',
            'joke',
            'admin_id'
        );
        // index for joke_of_day_date column in table joke
        $this->createIndex(
            'idx-joke-joke_of_day_date',
            'joke',
            'joke_of_day_date'
        );
        // index for rating column in table joke
        $this->createIndex(
            'idx-joke-rating',
            'joke',
            'rating'
        );
    }

}
