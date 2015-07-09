<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form about `frontend\models\Registration`.
 */
class RegistrationSearch extends Registration
{
    public $fullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age','personal_type'], 'integer'],
            [['department','title', 'fist_name', 'last_name', 'email', 'register_date', 'cell_phone', 'sex', 'position', 'level', 'personal_id', 'office', 'occupation','fullName'], 'safe'],
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
        $query = Registration::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'register_date' => $this->register_date,
            'age' => $this->age,
            'personal_type'=>$this->personal_type
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'fist_name', $this->fist_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cell_phone', $this->cell_phone])
            ->andFilterWhere(['like', 'sex', $this->sex]) 
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'personal_id', $this->personal_id])
            ->andFilterWhere(['like', 'office', $this->office])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->orFilterWhere(['like', 'fist_name', $this->fullName])
            ->orFilterWhere(['like', 'last_name', $this->fullName]);



        return $dataProvider;
    }
}
