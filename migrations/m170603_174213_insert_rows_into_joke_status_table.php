<?php

use yii\db\Migration;

class m170603_174213_insert_rows_into_joke_status_table extends Migration
{
    public function up()
    {
        $this->batchInsert('joke_status', ['status'], [
                ['Neodobreno'],
                ['Odobreno'],
                ['Izbrisano'],
        ]);
    }

}
