<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m170603_094419_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(11)->notNull(),
            'first_name' => $this->string(50)->notNull(),
            'last_name' => $this->string(50)->notNull(),
            'email' => $this->string(100)->notNull(),
            'password' => $this->string(10)->notNull(),
            'active' => $this->integer(1)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('admin');
    }
}
