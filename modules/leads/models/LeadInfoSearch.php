<?php

namespace app\modules\leads\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LeadInfoSearch represents the model behind the search form about `app\modules\lead_info\models\LeadInfo`.
 */
class LeadInfoSearch extends LeadInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'product_id', 'lead_channel_id', 'partner_id', 'aff_id', 'lead_landing_id', 'lead_form_id', 'ga_cid', 'utm_medium', 'utm_term', 'utm_content', 'utm_campaign', 'promocode_id', 'count_orders', 'count_sells', 'total_lessons'], 'integer'],
            [['create_time', 'source', 'conv_url'], 'safe'],
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
        $query = LeadInfo::find();

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
            'lead_channel_id' => $this->lead_channel_id,
            'partner_id' => $this->partner_id,
            'aff_id' => $this->aff_id,
            'lead_landing_id' => $this->lead_landing_id,
            'lead_form_id' => $this->lead_form_id,
            'ga_cid' => $this->ga_cid,
            'utm_medium' => $this->utm_medium,
            'utm_term' => $this->utm_term,
            'utm_content' => $this->utm_content,
            'utm_campaign' => $this->utm_campaign,
            'promocode_id' => $this->promocode_id,
            'count_orders' => $this->count_orders,
            'count_sells' => $this->count_sells,
            'total_lessons' => $this->total_lessons,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'conv_url', $this->conv_url]);

        return $dataProvider;
    }
}
