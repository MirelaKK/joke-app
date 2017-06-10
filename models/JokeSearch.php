<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JokeWithCategory;
use app\models\JokeCategory;

/**
 * JokeSearch represents the model behind the search form about `app\models\Joke`.
 */
class JokeSearch extends JokeWithCategory
{

    public function rules()
    {
        return [ 
            [['id', 'joke_status_id', 'admin_id', 'joke_rating'], 'integer'],
            [['title', 'joke', 'submit_date', 'submitter', 'approval_date', 'joke_of_day_date'], 'safe']];
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
            'sort' =>['defaultOrder'=>['joke_status_id'=>SORT_ASC,
                                        'submit_date'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
         // grid filtering conditions
        $this->searchDateRange($query,$this->joke_of_day_date,'joke_of_day_date');  
        $this->searchDateRange($query,$this->approval_date,'approval_date');
        $this->searchDateRange($query,$this->publish_date,'publish_date');
        $this->searchDateRange($query,$this->submit_date,'submit_date');   
        
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
            ->andFilterWhere(['like', 'submitter', $this->submitter]);
            
        
        return $dataProvider;
    }
    /*
     * search helper method for seraching many-to-many related model
     * @param array $params
     * @return mixed
     */
    public function getJokeIdsFromCategoryIds($params){
            if(!empty($params['JokeSearch']['category_ids'])){

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
        return;
    }
    /*
     * search helper method for getting result from specified range
     */
    public function searchDateRange($query,$param,$par) {
            if(!empty($param) && strpos($param,'-') !== false) { 
            list($start_date, $end_date) = explode(' - ', $param); 
            $query->andFilterWhere(['between',$par, $start_date, $end_date]); 
            } 
    }
}
