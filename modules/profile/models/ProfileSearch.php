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

    public $fullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'age', 'isRemoved'], 'integer'],
            [['skype','user_id', 'country', 'city', 'ip_address', 'gender', 'dob', 'activity', 'interests', 'user.email','fullName'], 'safe'],

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
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['user.email']);
    }



    public function search($params)
    {
        $query = Profile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

//            'sort' => [
//                'attributes' => [
//                    'user.email' => [
//                        'asc' => ['user.email' => SORT_ASC],
//                        'desc' => ['user.email' => SORT_DESC],
//                    ],
//                    'fullName' => [
//                        'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
//                        'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
//                        'label' => 'Full Name',
//                        'default' => SORT_ASC
//                    ],
//                ],

//            ]
        ]);



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->joinWith('user');


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user.username' => $this->user->username,
            'user.email' => $this->user->email,
            'fullName' => $this->getFullName(),
            'phone' => $this->phone,
            'age' => $this->age,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'isRemoved' => $this->isRemoved,
        ]);




        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);


        $query->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'user.email', $this->getAttribute('user.email')])
            ->andFilterWhere(['isRemoved'=>'1'])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'activity', $this->activity])
            ->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
                'OR last_name LIKE "%' . $this->fullName . '%"')
            ->andFilterWhere(['like', 'interests', $this->interests]);

//        $query = Profile::find()->andWhere(['isRemoved' => 1]);

        return $dataProvider;
    }
}
