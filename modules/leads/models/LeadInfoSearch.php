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
            [['id','partner_id', 'aff_id', 'ga_cid', 'utm_medium', 'utm_term', 'utm_content', 'utm_campaign','count_orders', 'count_sells', 'total_lessons'], 'integer'],
            [['create_time', 'source', 'conv_url','user_id','product_id', 'promocode_id', 'lead_channel_id', 'lead_landing_id', 'lead_form_id'], 'safe'],
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


         $query->joinWith('leadForm');
         $query->joinWith('leadLanding');
         $query->joinWith('leadChannel');
        $query->joinWith('promocode');
         $query->joinWith('product');
         $query->joinWith('user');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'create_time' => $this->create_time,
            'user.username' => $this->user->username,
            'product.name' => $this->product->name,
            'lead_channel.name' => $this->leadChannel->name,
            'partner_id' => $this->partner_id,
            'aff_id' => $this->aff_id,
            'lead_landing.name' => $this->leadLanding->name,
            'lead_form.name' => $this->leadForm->name,
            'ga_cid' => $this->ga_cid,
            'utm_medium' => $this->utm_medium,
            'utm_term' => $this->utm_term,
            'utm_content' => $this->utm_content,
            'utm_campaign' => $this->utm_campaign,
            'promocode.promo_name' => $this->promocode->promo_name,
            'count_orders' => $this->count_orders,
            'count_sells' => $this->count_sells,
            'total_lessons' => $this->total_lessons,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'conv_url', $this->conv_url])
            ->andFilterWhere(['like', 'lead_channel.name', $this->lead_channel_id])
            ->andFilterWhere(['like', 'lead_landing.name', $this->lead_landing_id])
            ->andFilterWhere(['like', 'lead_form.name', $this->lead_form_id])
            ->andFilterWhere(['like', 'product.name', $this->product_id])
            ->andFilterWhere(['like', 'promocode.promo_name', $this->promocode_id])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
        ;

        return $dataProvider;
    }
}
