<?php

namespace app\modules\tutors\models;

use app\modules\orders\models\OrderInfo;

/**
 * This is the model class for table "tutor_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property OrderInfo[] $orderInfos
 */
class TutorType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutor_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['tutor_type_id' => 'id']);
    }
}
