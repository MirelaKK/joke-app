<?php

use yii\db\Migration;

class m170606_153425_populate_joke_comments_table extends Migration
{
    public function up()
    {
            $this->batchInsert('joke_comments', ['joke_id','submitter','joke_comment'], [
                    [1,'Danijela','Super vic'],
                    [1,'Mirela','Nije loš vic'],
        ]);
    }

}
