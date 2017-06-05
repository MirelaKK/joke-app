<?php

use yii\db\Migration;

class m170605_220308_alter_joke_rating_column_in_joke_table extends Migration
{
    public function up()
    {
        $this->alterColumn('joke', 'joke_rating', $this->integer());
    }

}
