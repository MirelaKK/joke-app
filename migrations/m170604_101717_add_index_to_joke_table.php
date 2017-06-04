<?php

use yii\db\Migration;

class m170604_101717_add_index_to_joke_table extends Migration
{
    public function up()
    {
        // index for title column in table joke
        $this->createIndex(
            'idx-joke-title',
            'joke',
            'title'
        );
    }

}
