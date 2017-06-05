<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "joke_comments".
 *
 * @property integer $id
 * @property integer $joke_id
 * @property string $submitter
 * @property string $joke_comment
 * @property string $submit_date
 * @property integer $active
 *
 * @property Joke $joke
 */
class JokeComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{joke_comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['submitter', 'joke_comment', 'active'], 'required'],
            [['active'], 'integer'],
            [['joke_comment'], 'string'],
            ['submit_date', 'default','value'=>function($model,$attributes){
                return date('Y-m-d H:i:s');
            }],
            [['submitter'], 'string', 'max' => 50],
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
            'joke_id' => 'ID vica',
            'submitter' => 'Poslao/Poslala',
            'joke_comment' => 'Komentar na vic',
            'submit_date' => 'Datum slanja',
            'active' => 'Aktivan/Aktivna',
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
