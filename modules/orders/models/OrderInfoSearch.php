<?php

namespace app\modules\orders\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\orders\models\OrderInfo;

/**
 * OrderInfoSearch represents the model behind the search form of `app\modules\orders\models\OrderInfo`.
 */
class OrderInfoSearch extends OrderInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'product_id', 'current_level', 'course_id', 'tutor_type_id', 'tutor_experience', 'connect_method', 'connect_time', 'frequence', 'goal', 'demo_total', 'demo_like', 'demo_dislike', 'demo_absent', 'demo_reject', 'isRemoved'], 'integer'],
            [['create_time', 'free_days', 'free_times', 'order_status', 'order_comment'], 'safe'],
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
        $query = OrderInfo::find();

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
            'client_id' => $this->client_id,
            'product_id' => $this->product_id,
            'current_level' => $this->current_level,
            'course_id' => $this->course_id,
            'tutor_type_id' => $this->tutor_type_id,
            'tutor_experience' => $this->tutor_experience,
            'connect_method' => $this->connect_method,
            'connect_time' => $this->connect_time,
            'frequence' => $this->frequence,
            'goal' => $this->goal,
            'demo_total' => $this->demo_total,
            'demo_like' => $this->demo_like,
            'demo_dislike' => $this->demo_dislike,
            'demo_absent' => $this->demo_absent,
            'demo_reject' => $this->demo_reject,
            'isRemoved' => $this->isRemoved,
        ]);

        $query->andFilterWhere(['like', 'free_days', $this->free_days])
            ->andFilterWhere(['like', 'free_times', $this->free_times])
            ->andFilterWhere(['like', 'order_status', $this->order_status])
            ->andFilterWhere(['like', 'order_comment', $this->order_comment]);

        return $dataProvider;
    }
}
