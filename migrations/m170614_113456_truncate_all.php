<?php

use yii\db\Migration;

class m170614_113456_truncate_all extends Migration
{
    public function safeUp()
    {
        $this->truncateTable('joke2category');
        $this->db->createCommand()->checkIntegrity(false)->execute();
        $this->truncateTable('category');
        $this->truncateTable('joke_rating');
        $this->truncateTable('joke_comments');
        $this->truncateTable('joke');
        $this->db->createCommand()->checkIntegrity(true)->execute();
    }

   
}
