<?php

use yii\db\Migration;

class m170606_090159_add_publish_date_in_joke_table extends Migration
{
    public function up()
    {
        $this->addColumn('joke', 'publish_date', $this->dateTime()->after('approval_date'));

    }

}
