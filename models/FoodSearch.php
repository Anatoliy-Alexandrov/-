<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Food;

/**
 * FoodSearch represents the model behind the search form of `app\models\Food`.
 */
class FoodSearch extends Food
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tb_class_id', 'subcategory_id', 'name_id', 'nickname_id', 'snack_quantity'], 'integer'],
            [['breakfast', 'breakfast_quantity', 'lunch', 'lunch_quantity', 'dinner', 'dinner_quantity', 'snack'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Food::find();

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
            'tb_class_id' => $this->tb_class_id,
            'subcategory_id' => $this->subcategory_id,
            'name_id' => $this->name_id,
            'nickname_id' => $this->nickname_id,
            'snack_quantity' => $this->snack_quantity,
        ]);

        $query->andFilterWhere(['like', 'breakfast', $this->breakfast])
            ->andFilterWhere(['like', 'breakfast_quantity', $this->breakfast_quantity])
            ->andFilterWhere(['like', 'lunch', $this->lunch])
            ->andFilterWhere(['like', 'lunch_quantity', $this->lunch_quantity])
            ->andFilterWhere(['like', 'dinner', $this->dinner])
            ->andFilterWhere(['like', 'dinner_quantity', $this->dinner_quantity])
            ->andFilterWhere(['like', 'snack', $this->snack]);

        return $dataProvider;
    }
}
