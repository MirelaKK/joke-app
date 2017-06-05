<?php

use yii\db\Migration;

class m170605_155401_altering_joke_rating_table extends Migration
{
    public function up()
    {
         $this->alterColumn('joke_rating', 'joke_rating', $this->integer()->notNull());
    }

}
