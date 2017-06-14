<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JokeRating;

/**
 * JokeRatingSearch represents the model behind the search form about `app\models\JokeRating`.
 */
class JokeRatingSearch extends JokeRating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'joke_id'], 'integer'],
            [['date_of_rating', 'ip'], 'safe'],
            [['joke_rating'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
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
        $query = JokeRating::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'joke_id' => $this->joke_id,
            'date_of_rating' => $this->date_of_rating,
            'joke_rating' => $this->joke_rating,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
