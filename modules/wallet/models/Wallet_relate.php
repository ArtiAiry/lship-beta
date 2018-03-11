<?php

namespace app\modules\wallet\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property integer $id
 * @property string $description
 * @property integer $payout_type_id
 * @property integer $bank_id
 * @property integer $currency_id
 * @property integer $user_id
 * @property integer $isRemoved
 *
 * @property Bank $bank
 * @property Currency $currency
 * @property PayoutType $payoutType
 * @property User $user
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payout_type_id', 'bank_id', 'currency_id', 'user_id'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['isRemoved'], 'string', 'max' => 1],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['payout_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayoutType::className(), 'targetAttribute' => ['payout_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'payout_type_id' => 'Payout Type ID',
            'bank_id' => 'Bank ID',
            'currency_id' => 'Currency ID',
            'user_id' => 'User ID',
            'isRemoved' => 'Is Removed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayoutType()
    {
        return $this->hasOne(PayoutType::className(), ['id' => 'payout_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
