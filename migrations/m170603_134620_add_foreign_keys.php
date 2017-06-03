<?php

use yii\db\Migration;

class m170603_134620_add_foreign_keys extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'fk-joke-admin_id',
            'joke',
            'admin_id',
            'admin',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-joke-status_id',
            'joke',
            'status_id',
            'joke_status',
            'id',
            'CASCADE'
        );
    }

}
