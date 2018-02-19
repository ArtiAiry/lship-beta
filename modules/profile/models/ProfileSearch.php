<?php

namespace app\modules\profile\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\profile\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `app\modules\profile\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'age', 'wallet_id', 'isRemoved'], 'integer'],
            [['skype','user_id', 'country', 'city', 'ip_address', 'gender', 'dob', 'activity', 'interests'], 'safe'],

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
        $query = Profile::find();

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


        $query->joinWith('user');

        $query->alias('u');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user.username' => $this->user_id,
            'phone' => $this->phone,
            'age' => $this->age,
            'dob' => $this->dob,
            'wallet_id' => $this->wallet_id,
            'isRemoved' => $this->isRemoved,
        ]);


        $query = Profile::find()->andWhere(['isRemoved' => 1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $query->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['isRemoved'=>'1'])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'activity', $this->activity])
            ->andFilterWhere(['like', 'interests', $this->interests]);

        return $dataProvider;
    }
}
