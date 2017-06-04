<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Joke extends ActiveRecord{
    
    public function rules()
    {
        return [
            [[ 'title','text','submitter'],'required'],
            [ 'status_id','default','value'=>1],
            ['submit_date','default','value'=>function ($model, $attribute) {
                return date('Y-m-d H:i:s');
            }],
            [[ 'approval_date','admin_id','joke_of_day_date','rating'],'safe'],
            [[ 'submit_date','approval_date'],'datetime'],
            [[ 'joke_of_day_date'],'date'],
            [[ 'status_id','admin_id'],'integer'],
            [[ 'rating'],'double']
        ];
    }
    
    public static function tableName(){
        return '{{joke}}';
    }
    
    public function getCategories() {
    return $this->hasMany(Category::className(), ['id'=> 'category_id' ])->viaTable('joke2category', ['joke_id' => 'id']);
    }

    
}