<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Joke;
use app\models\JokeWithCategory;
use yii\helpers\ArrayHelper;

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
        $query = Joke::find()->where(['not', ['joke_status_id' => 5]]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>['defaultOrder'=>['joke_status_id'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        function range($query,$param,$par) {
            if(!empty($param) && strpos($param,'-') !== false) { 
            list($start_date, $end_date) = explode(' - ', $param); 
            $query->andFilterWhere(['between',$par, $start_date, $end_date]); 
            } 
        }
        
        range($query,$this->joke_of_day_date,'joke_of_day_date');  
        range($query,$this->approval_date,'approval_date');
        range($query,$this->publish_date,'publish_date');
        range($query,$this->submit_date,'submit_date');   
        

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'joke_status_id' => $this->joke_status_id,
            'admin_id' => $this->admin_id,
            'joke_rating' => $this->joke_rating,
        ]);

        $category_ids=implode(' ', $this->category_ids);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'joke', $this->joke])
            ->andFilterWhere(['like', 'submitter', $this->submitter]);
            
        
        if(null != $this->category_ids){ 
            foreach ($params['category_ids'] as $value) {
            foreach ($this->category_ids as $key => $category_id) {
               
                   $query->orFilterWhere(['like', $value, $category_id]); 
                }
                
            }
        }
        return $dataProvider;
    }
}
