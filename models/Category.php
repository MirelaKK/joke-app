<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Joke;

class Category extends ActiveRecord{
    
    public function rules()
    {
        return [
            [['id', 'category'],'required'],
            ['id','integer']
            
        ];
    }
    
    public static function tableName(){
        return '{{kategorije}}';
    }
    public function getJokes() {
    return $this->hasMany(Joke::className(), ['id'=> 'vic_id' ])->viaTable('vicevi_kategorije', ['category_id' => 'id']);
}
}