<?php

use yii\db\Migration;

class m170604_104824_populate_category_table extends Migration
{
    public function up()
    {
        $this->batchInsert('category', ['category','sort_key'], [
                ['Životinje',1],
                ['Crni humor',2],
                ['Policajci',3],
                ['Plavuše',4],
                ['Perica',5],
                ['Mujo i Haso',6],
                ['Kompjuterski',7],
                ['Politički',8],
        ]);
    }

}
