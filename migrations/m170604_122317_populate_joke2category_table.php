<?php

use yii\db\Migration;

class m170604_122317_populate_joke2category_table extends Migration
{
    public function up()
    {
        $this->batchInsert('joke2category', ['joke_id', 'category_id'], 
                [[1,7], [2,7], [3,2], [3,7], [4,1], [5,1], [6,2], [7,2], [8,7], [9,3], [10,2], [10,4], [11,4], [14,6], [15,6]]);
    }
}
