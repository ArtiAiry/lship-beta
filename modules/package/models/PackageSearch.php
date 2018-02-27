<?php

namespace app\modules\package\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\package\models\Package;

/**
 * PackageSearch represents the model behind the search form about `app\modules\package\models\Package`.
 */
class PackageSearch extends Package
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'product_id', 'course_type_id', 'duration', 'tutor_id', 'rate', 'left_lessons', 'passed_lessons', 'total_lessons', 'isRemoved'], 'integer'],
            [['comment', 'status'], 'safe'],
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
        $query = Package::find();

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
            'client_id' => $this->client_id,
            'product_id' => $this->product_id,
            'course_type_id' => $this->course_type_id,
            'duration' => $this->duration,
            'tutor_id' => $this->tutor_id,
            'rate' => $this->rate,
            'left_lessons' => $this->left_lessons,
            'passed_lessons' => $this->passed_lessons,
            'total_lessons' => $this->total_lessons,
            'isRemoved' => $this->isRemoved,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
