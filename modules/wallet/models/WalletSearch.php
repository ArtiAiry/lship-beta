<?php

namespace app\modules\wallet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\wallet\models\Wallet;

/**
 * WalletSearch represents the model behind the search form about `app\modules\wallet\models\Wallet`.
 */
class WalletSearch extends Wallet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'payout_type_id', 'bank_id', 'currency_id'], 'integer'],
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
        $query = Wallet::find();

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
            'payout_type_id' => $this->payout_type_id,
            'bank_id' => $this->bank_id,
            'currency_id' => $this->currency_id,
        ]);

        return $dataProvider;
    }
}
