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
            [['id'],'integer'],
            [['payout_type_id', 'bank_id', 'currency_id'], 'safe'],
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

        $query->joinWith('payoutType');
        $query->joinWith('currency');
        $query->joinWith('bank');



        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'payoutType.name' => $this->payoutType->name,
            'bank.name' => $this->bank->name,
            'currency.name' => $this->currency->name,
        ]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);


        $query->andFilterWhere(['like', 'payoutType.name', $this->payout_type_id])
            ->andFilterWhere(['like', 'bank.name', $this->bank_id])
            ->andFilterWhere(['like', 'currency.name', $this->currency_id]);


        return $dataProvider;
    }
}
