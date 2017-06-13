<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "joke_rating".
 *
 * @property integer $id
 * @property integer $joke_id
 * @property string $date_of_rating
 * @property string $ip
 * @property double $joke_rating
 *
 * @property Joke $joke
 */
class JokeRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{joke_rating}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['joke_id', 'ip', 'joke_rating'], 'required'],
            ['date_of_rating', 'default','value'=>function($model,$attributes){
                return date('Y-m-d H:i:s');
            }],
            [['joke_id'], 'integer'],
            [['joke_rating'], 'number'],
            [['ip'], 'ip'],
            [['ip'], 'unique', 'message'=> 'Ne možete dva puta glasati'],
            [['joke_id'], 'exist', 'skipOnError' => true, 'targetClass' => Joke::className(), 'targetAttribute' => ['joke_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'joke_id' => 'ID Vica',
            'date_of_rating' => 'Datum Ratinga',
            'ip' => 'Ip adresa',
            'joke_rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJoke()
    {
        return $this->hasOne(Joke::className(), ['id' => 'joke_id']);
    }
}
