<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Events;

/**
 * EventsSearch represents the model behind the search form about `common\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['title', 'description', 'venue', 'start_date', 'end_date', 'poster', 'logo', 'open_registration', 'close_registration', 'create_date', 'update_date', 'payment_detail', 'contact', 'open', 'open_auto', 'status'], 'safe'],
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
        $query = Events::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'open_registration' => $this->open_registration,
            'close_registration' => $this->close_registration,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'poster', $this->poster])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'payment_detail', $this->payment_detail])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'open', $this->open])
            ->andFilterWhere(['like', 'open_auto', $this->open_auto])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
