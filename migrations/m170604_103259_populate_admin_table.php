<?php

use yii\db\Migration;

class m170604_103259_populate_admin_table extends Migration
{
    public function up()
    {
        // active column can take values 0 for false and 1 for true
        $this->batchInsert('admin', ['first_name','last_name','email','password','active'], [
                ['Admin','Jedan','admin1@example.com','admn1',1],
                ['Admin','Dva','admin2@example.com','admn2',1]
        ]);
    }

}
