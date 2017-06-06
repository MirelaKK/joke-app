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
    $category_ids = [];
 
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            // each category_id must exist in category table (*1)
            ['category_ids', 'each', 'rule' => [
                    'exist', 'targetClass' => Category::className(), 'targetAttribute' => 'id'
                ]
            ],
        ]);
    }
 
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_ids' => 'Categories',
        ]);
    }
 
    /**
     * load the post's categories (*2)
     */
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
 
    /**
     * save the post's categories (*3)
     */
    public function saveCategories()
    {
        /* clear the categories of the post before saving */
        JokeCategory::deleteAll(['post_id' => $this->id]);
        if (is_array($this->category_ids)) {
            foreach($this->category_ids as $category_id) {
                $jc = new JokeCategory();
                $jc->post_id = $this->post_id;
                $jc->category_id = $category_id;
                $jc->save();
            }
        }
        /* Be careful, $this->category_ids can be empty */
    }
}
    

