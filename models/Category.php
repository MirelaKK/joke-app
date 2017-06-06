<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Joke;
use yii\helpers\ArrayHelper;

class Category extends ActiveRecord{
    
    public function rules()
    {
        return [
            [['category'],'required','message' => 'Polje ne može bitit prazno'],
            [['category'],'string', 'max' => 50],
            [['sort_key'],'safe'],
            [['id','sort_key'],'integer','message' => 'Polje treba sadržavati samo brojeve.'],
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
    /**
     * Get all the available categories
     * @return array available categories
     */
    public static function getAvailableCategories()
    {
        $categories = self::find()->all();
        $items = ArrayHelper::map($categories, 'id', 'category');
        return $items;
    }
}