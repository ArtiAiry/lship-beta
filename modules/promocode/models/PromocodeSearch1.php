<?php

namespace app\modules\promocode\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * PromocodeSearch represents the model behind the search form about `app\modules\promocode\models\Promocode`.
 */
class PromocodeSearch extends Promocode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'action_id'], 'safe'],
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
        $query = Promocode::find();

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


        $query->joinWith('action');


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'action.name' => $this->action->name,
            'isRemoved' => $this->isRemoved,
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);


//        $query = Promocode::find()->andWhere(['isRemoved' => 1]);

        $query
            ->andFilterWhere(['like', 'action.name', $this->action_id])

//            ->andFilterWhere(['like', 'name', $this->name])
        ;



        return $dataProvider;
    }
}
