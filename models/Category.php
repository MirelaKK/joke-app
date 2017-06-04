<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Joke;

class Category extends ActiveRecord{
    
    public function rules()
    {
        return [
            [['category'],'required'],
            [['sort_key'],'safe']
        ];
    }
    
    public static function tableName(){
        return '{{category}}';
    }

    public function getJokes() {
    return $this->hasMany(Joke::className(), ['id'=> 'joke_id' ])->viaTable('joke2category', ['category_id' => 'id']);
    }
}