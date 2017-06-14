<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Joke;
use yii\helpers\ArrayHelper;

/**
 * SiteSearch represents the model behind the search form about `app\models\Joke`.
 */
class SiteSearch extends Joke
{
    public $search;
    public function rules()
    {
        return [ 
            [['search'], 'safe']];
    }
    
        public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'search' => 'Pretraga',
        ]);
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
        $query = Joke::find()->where(['joke_status_id' => 4]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>['defaultOrder'=>['submit_date'=>SORT_ASC]],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
         // grid filtering conditions 

        $query->andFilterWhere(['like', 'title', $params['SiteSearch']['search']])
            ->orFilterWhere(['like', 'joke', $params['SiteSearch']['search']]);
            
        
        return $dataProvider;
    }

}