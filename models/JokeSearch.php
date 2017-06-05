<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Joke;

/**
 * JokeSearch represents the model behind the search form about `app\models\Joke`.
 */
class JokeSearch extends Joke
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'joke_status_id', 'admin_id', 'joke_rating'], 'integer'],
            [['title', 'joke', 'submit_date', 'submitter', 'approval_date', 'joke_of_day_date'], 'safe'],
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
        $query = Joke::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'submit_date' => $this->submit_date,
            'joke_status_id' => $this->joke_status_id,
            'approval_date' => $this->approval_date,
            'admin_id' => $this->admin_id,
            'joke_of_day_date' => $this->joke_of_day_date,
            'joke_rating' => $this->joke_rating,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'joke', $this->joke])
            ->andFilterWhere(['like', 'submitter', $this->submitter]);

        return $dataProvider;
    }
}
