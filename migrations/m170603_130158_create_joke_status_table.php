<?php

use yii\db\Migration;

/**
 * Handles the creation of table `joke_status`.
 */
class m170603_130158_create_joke_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('joke_status', [
            'id' => $this->primaryKey(),
            'status' => $this->string(15)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('joke_status');
    }
}
