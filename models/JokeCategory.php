<?php

namespace app\models;

use Yii;

/**
 * This is the model class for junction table "joke2category".
 *
 * @property integer $joke_id
 * @property integer $category_id
 *
 * @property Category $category
 * @property Joke $joke
 */
class JokeCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{joke2category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['joke_id', 'category_id'], 'required','message'=>'Polje ne može biti prazno'],
            [['joke_id', 'category_id'], 'integer','message'=>'Polje može da sadrži samo cijele brojeve'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['joke_id'], 'exist', 'skipOnError' => true, 'targetClass' => Joke::className(), 'targetAttribute' => ['joke_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'joke_id' => 'ID vica',
            'category_id' => 'ID kategorije',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJoke()
    {
        return $this->hasOne(Joke::className(), ['id' => 'joke_id']);
    }
}
