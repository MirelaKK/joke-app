<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "joke_status".
 *
 * @property integer $id
 * @property string $status
 *
 * @property Joke[] $jokes
 */
class JokeStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{joke_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required','message'=>'Polje ne može biti prazno'],
            [['status'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJokes()
    {
        return $this->hasMany(Joke::className(), ['joke_status_id' => 'id']);
    }
}
