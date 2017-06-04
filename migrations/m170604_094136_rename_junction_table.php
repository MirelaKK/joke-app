<?php

use yii\db\Migration;

class m170604_094136_rename_junction_table extends Migration
{
    public function up()
    {
        $this->renameTable('joke_category','joke2category');
    }

}
