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
 * @property integer $joke_status_id
 * @property string $approval_date
 * @property string $publish_date
 * @property integer $admin_id
 * @property string $joke_of_day_date
 * @property double $joke_rating
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
            [['title', 'joke','admin_id'], 'required','message' => 'Polje ne može biti prazno.'],
            [['joke'], 'string'],
            ['submit_date', 'default','value'=>function($model,$attributes){
                return date('Y-m-d H:i:s');
            }],
            [['joke_status_id', 'admin_id'], 'integer'],
            ['approval_date', 'default','value'=>function(){
                return date('Y-m-d H:i:s');
            },'when' => function ($model) {
                return $model->joke_status_id == 2;
            }],
            ['submitter','default','value'=>function($model,$attributes){
                $f_name = $this->admin->first_name;
                $l_name = $this->admin->last_name;
                 return $f_name." ".$l_name;
            }],
            [['approval_date', 'joke_of_day_date','publish_date'], 'safe'],
            [['joke_rating'], 'number'],
            [['title', 'submitter'], 'string', 'max' => 50],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_id' => 'id']],
            ['joke_status_id', 'default','value'=>1],
            [['joke_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => JokeStatus::className(), 'targetAttribute' => ['joke_status_id' => 'id']],
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
            'submitter' => 'Poslao',
            'joke_status_id' => 'Status vica',
            'approval_date' => 'Datum odobrenja',
            'publish_date' => 'Datum odbjavljivanja',
            'admin_id' => 'Admin',
            'joke_of_day_date' => 'Datum za vic dana',
            'joke_rating' => 'Rating',
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
        return $this->hasOne(JokeStatus::className(), ['id' => 'joke_status_id']);
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
