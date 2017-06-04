<?php

use yii\db\Migration;

class m170604_091739_add_sort_key_column_to_category extends Migration
{
    public function up()
    {
        $this->addColumn('category', 'sort_key', $this->integer(11));
    }

}
