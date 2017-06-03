<?php

use yii\db\Migration;

/**
 * Handles the creation of table `joke`.
 */
class m170603_131938_create_joke_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('joke', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'joke' => $this->text()->notNull(),
            'submit_date' => $this->dateTime()->notNull(),
            'submitter' => $this->string(50)->notNull(),
            'status_id' =>$this->integer(11)->notNull()->defaultValue(1),
            'approval_date' => $this->dateTime(),
            'admin_id'=>$this->integer(11),
            'joke_of_day_date'=>$this->date()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('joke');
    }
}
