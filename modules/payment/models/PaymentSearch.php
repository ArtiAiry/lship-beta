<?php

namespace app\modules\payment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\payment\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `app\modules\payment\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'payment_type_id', 'package_id', 'lessons', 'stock_lessons', 'total_lessons', 'is_rejected'], 'integer'],
            [['create_time'], 'safe'],
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
        $query = Payment::find();

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
            'payment_type_id' => $this->payment_type_id,
            'package_id' => $this->package_id,
            'lessons' => $this->lessons,
            'stock_lessons' => $this->stock_lessons,
            'total_lessons' => $this->total_lessons,
            'is_rejected' => $this->is_rejected,
        ]);

        return $dataProvider;
    }
}
