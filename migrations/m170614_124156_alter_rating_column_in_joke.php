<?php

use yii\db\Migration;

class m170614_124156_alter_rating_column_in_joke extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('joke', 'joke_rating', $this->double()->defaultValue(2.5));
    }

   
}
