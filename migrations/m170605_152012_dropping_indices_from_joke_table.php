<?php

use yii\db\Migration;

class m170605_152012_dropping_indices_from_joke_table extends Migration
{
    public function up()
    {
        $this->dropIndex('idx-joke-submitter','joke');

        $this->dropIndex('idx-joke-title','joke');

    }
}
