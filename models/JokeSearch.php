<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Joke;
use app\models\JokeWithCategory;
use app\models\JokeCategory;
use app\models\Category;

/**
 * JokeSearch represents the model behind the search form about `app\models\Joke`.
 */
class JokeSearch extends JokeWithCategory
{
    public function rules()
    {
        return [
            [['id', 'joke_status_id', 'admin_id', 'joke_rating'], 'integer'],
            [['title', 'joke', 'submit_date', 'submitter', 'approval_date', 'joke_of_day_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = JokeWithCategory::find()->where(['not', ['joke_status_id' => 5]]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>['defaultOrder'=>['joke_status_id'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'joke_status_id' => $this->joke_status_id,
            'admin_id' => $this->admin_id,
            'joke_rating' => $this->joke_rating,
        ]);
        
        $ids = $this->getJokeIdsFromCategoryIds($params);

        $query->andFilterWhere(['in','id',$ids])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'joke', $this->joke])
            ->andFilterWhere(['like', 'submitter', $this->submitter])
            ->andFilterWhere(['like', 'approval_date', $this->approval_date])
            ->andFilterWhere(['like', 'submit_date', $this->submit_date])
            ->andFilterWhere(['like', 'publish_date', $this->publish_date])
            ->andFilterWhere(['like', 'joke_of_day_date', $this->joke_of_day_date]);
  
        return $dataProvider;
    }
    protected function getJokeIdsFromCategoryIds($params){
               if(isset($params['JokeSearch']['category_ids'])){
           $category_ids=[];
       
           foreach($params['JokeSearch']['category_ids'] as $category_id){

               $category_ids[]=$category_id;
           }
           $subqueries= JokeCategory::find()
                    ->select('joke_id')
                   ->where(['in','category_id',$category_ids])
                    ->all();
            $ids=[];
            foreach($subqueries as $subquery){
                $ids[]=$subquery->joke_id;
            }

       return $ids;
        }
    }
}
