<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JokeComments;

/**
 * JokeCommentsSearch represents the model behind the search form about `app\models\JokeComments`.
 */
class JokeCommentsSearch extends JokeComments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'joke_id', 'active'], 'integer'],
            [['submitter', 'joke_comment', 'submit_date'], 'safe'],
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
        $query = JokeComments::find();

        // add conditions that should always apply here

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
            'joke_id' => $this->joke_id,
            'submit_date' => $this->submit_date,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'submitter', $this->submitter])
            ->andFilterWhere(['like', 'joke_comment', $this->joke_comment]);

        return $dataProvider;
    }
}
