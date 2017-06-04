<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "joke".
 *
 * @property integer $id
 * @property string $title
 * @property string $joke
 * @property string $submit_date
 * @property string $submitter
 * @property integer $status_id
 * @property string $approval_date
 * @property integer $admin_id
 * @property string $joke_of_day_date
 * @property double $rating
 *
 * @property Admin $admin
 * @property JokeStatus $status
 * @property Category[] $categories
 * @property JokeComments[] $jokeComments
 * @property JokeRating[] $jokeRatings
 */
class Joke extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{joke}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'joke', 'submitter'], 'required'],
            [['joke'], 'string'],
            ['submit_date', 'default','value'=>function($model,$attributes){
                return date('Y-m-d H:i:s');
            }],
            [['submit_date', 'approval_date', 'joke_of_day_date'], 'safe'],
            [['status_id', 'admin_id'], 'integer'],
            [['rating'], 'number'],
            [['title', 'submitter'], 'string', 'max' => 50],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_id' => 'id']],
            ['status_id', 'default','value'=>1],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => JokeStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Naziv',
            'joke' => 'Tekst',
            'submit_date' => 'Datum slanja',
            'submitter' => 'Poslao/Poslala',
            'status_id' => 'Status ID',
            'approval_date' => 'Datum odobrenja',
            'admin_id' => 'Admin ID',
            'joke_of_day_date' => 'Datum za vic dana',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(JokeStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('joke2category', ['joke_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJokeComments()
    {
        return $this->hasMany(JokeComments::className(), ['joke_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJokeRatings()
    {
        return $this->hasMany(JokeRating::className(), ['joke_id' => 'id']);
    }
}
