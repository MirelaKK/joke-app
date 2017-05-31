<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Joke extends ActiveRecord{
    
    public function rules()
    {
        return [
            [['id', 'title','text'],'required'],
            ['id','integer']
        ];
    }
    
    public static function tableName(){
        return '{{vicevi}}';
    }
    public function getCategories() {
    return $this->hasMany(Category::className(), ['id'=> 'category_id' ])->viaTable('vicevi_kategorije', ['vic_id' => 'id']);
}
}