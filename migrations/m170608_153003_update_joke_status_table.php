<?php

use yii\db\Migration;

class m170608_153003_update_joke_status_table extends Migration
{
    public function up()
    {
        $this->update('joke_status',['status' =>'Pregledan i neodobren'],['id'=>2]);
        $this->update('joke_status',['status' =>'Odobren'],['id'=>3]);
        $this->update('joke_status',['status' =>'Objavljen'],['id'=>4]);
        $this->update('joke_status',['status' =>'Izbrisan'],['id'=>5]);
    }

}
