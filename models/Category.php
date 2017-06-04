<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Joke;

class Category extends ActiveRecord{
    
    public function rules()
    {
        return [
            [['category'],'required'],
            [['category'],'string', 'max' => 50],
            [['sort_key'],'safe'],
            [['id','sort_key'],'integer'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Kategorija',
            'sort_key' => 'Sort',
        ];
    }
    
    public static function tableName(){
        return '{{category}}';
    }

    public function getJokes() {
    return $this->hasMany(Joke::className(), ['id'=> 'joke_id' ])->viaTable('joke2category', ['category_id' => 'id']);
    }
}