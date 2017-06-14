<?php

use yii\db\Migration;

class m170614_121515_populate_category_table extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('category', ['id','category','sort_key'], [
                    [1,'Ne znam',0],
                    [2,'Crni humor',2],
            [3,'Haso, Fata, Mujo',3],
            [4,'Novinski',5],
            [5,'Plavuše',6],
            [6,'Policajci',13],
            [7,'Politički',7],
            [8,'Religija',8],
            [9,'Seks',5],
            [10,'Sport',17],
            [11,'Narodi',8],
            [12,'Škola',18],
            [13,'Životinje',10],
            [14,'Pitanje Odgovor',9],
            [15,'Kompjuterski',4],
            [16,'Glupi',16],
            [17,'SMS/Grafiti',19],
            [18,'Oglasi',20],
            [19,'Ratni',12],
            [20,'Aforizmi',21],
            [21,'Piramida',22],
            [29,'Chuck Norris',23]
        ]);
    }

}
