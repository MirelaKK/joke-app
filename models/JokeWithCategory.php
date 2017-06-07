<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\JokeCategory;

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
 * @property integer $joke_rating
 *
 * @property Admin $admin
 * @property JokeStatus $jokeStatus
 * @property Joke2category[] $joke2categories
 * @property Category[] $categories
 * @property JokeComments[] $jokeComments
 * @property JokeRating[] $jokeRatings
 */
class JokeWithCategory extends Joke
{


    /**
     * @var array IDs of the categories
     */
    public $category_ids = [];
 
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['category_ids', 'required','message' => 'Morate izabrati barem jednu kategoriju.'],
            // each category_id must exist in category table 
            ['category_ids', 'each', 'rule' => [
                    'exist', 'targetClass' => Category::className(), 'targetAttribute' => 'id'
                ],
            ],
        ]);
    }
 
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_ids' => 'Kategorije',
        ]);
    }

    public function loadCategories()
    {
        $this->category_ids = [];
        if (!empty($this->id)) {
            $rows = JokeCategory::find()
                ->select(['category_id'])
                ->where(['joke_id' => $this->id])
                ->asArray()
                ->all();
            foreach($rows as $row) {
               $this->category_ids[] = $row['category_id'];
            }
        }
    }
 
    public function saveCategories()
    {
        /* clear the categories of the joke before saving */
        JokeCategory::deleteAll(['joke_id' => $this->id]);
        if (is_array($this->category_ids)) {
            foreach($this->category_ids as $category_id) {
                $jc = new JokeCategory();
                $jc->joke_id = $this->id;
                $jc->category_id = $category_id;
                $jc->save();
            }
        }
    }
}
    

