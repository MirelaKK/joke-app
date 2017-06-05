<?php

use yii\db\Migration;

class m170605_154853_renaming_column_in_joke_comments_table extends Migration
{
    public function up()
    {
        $this->renameColumn('joke_comments', 'submitter_name', 'submitter');
    }

}
