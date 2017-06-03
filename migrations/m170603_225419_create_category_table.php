<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m170603_225419_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(11),
            'category' => $this->string(50)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
