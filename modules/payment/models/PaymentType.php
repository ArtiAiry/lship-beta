<?php

namespace app\modules\payment\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Payment[] $payments
 */
class PaymentType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_type';
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
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['payment_type_id' => 'id']);
    }
}
