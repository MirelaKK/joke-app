<?php

use yii\db\Migration;

class m170604_092711_alter_sort_key_column_in_category extends Migration
{
    public function up()
    {
        $this->alterColumn('category', 'sort_key', $this->integer(11)->notNull());
    }

    
}
