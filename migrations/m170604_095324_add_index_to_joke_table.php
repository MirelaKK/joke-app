<?php

use yii\db\Migration;

class m170604_095324_add_index_to_joke_table extends Migration
{
    public function up()
    {

        // index for submit_date column in table joke
        $this->createIndex(
            'idx-joke-submit_date',
            'joke',
            'submit_date'
        );
        // index for submitter column in table joke
        $this->createIndex(
            'idx-joke-submitter',
            'joke',
            'submitter'
        );
        // index for status_id column in table joke
        $this->createIndex(
            'idx-joke-status_id',
            'joke',
            'status_id'
        );
    }    
}
