<?php

namespace app\modules\orders\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * OrderStatusLogSearch represents the model behind the search form about `app\modules\order_info\models\OrderStatusLog`.
 */
class OrderStatusLogSearch extends OrderStatusLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'creator_id', 'order_id'], 'integer'],
            [['create_time', 'status'], 'safe'],
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
        $query = OrderStatusLog::find();

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
            'create_time' => $this->create_time,
            'creator_id' => $this->creator_id,
            'order_id' => $this->order_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
