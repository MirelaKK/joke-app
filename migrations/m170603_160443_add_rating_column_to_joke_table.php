<?php

use yii\db\Migration;

/**
 * Handles adding rating to table `joke`.
 */
class m170603_160443_add_rating_column_to_joke_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('joke', 'rating', $this->double());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('joke', 'rating');
    }
}
