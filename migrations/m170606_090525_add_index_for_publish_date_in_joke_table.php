<?php

use yii\db\Migration;

class m170606_090525_add_index_for_publish_date_in_joke_table extends Migration
{
    public function up()
    {      
        $this->createIndex(
            'idx-joke-publish_date',
            'joke',
            'publish_date'
        );
    }
}
