<?php

use yii\db\Migration;

class m170605_194310_rename_status_id_to_joke_status_id extends Migration
{
    public function up()
    {
        $this->renameColumn('joke', 'status_id', 'joke_status_id');
    }

}
