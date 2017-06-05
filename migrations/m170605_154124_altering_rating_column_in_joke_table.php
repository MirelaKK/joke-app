<?php

use yii\db\Migration;

class m170605_154124_altering_rating_column_in_joke_table extends Migration
{
    public function up()
    {
        $this->alterColumn('joke', 'rating', $this->integer()->notNull());
        $this->renameColumn('joke', 'rating', 'joke_rating');
    }

}
