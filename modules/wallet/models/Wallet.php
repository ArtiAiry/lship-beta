<?php

namespace app\modules\wallet\models;

use app\modules\payout\models\PayoutType;
use app\modules\profile\models\Profile;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "wallet".
 *
 * @property integer $id
 * @property integer $payout_type_id
 * @property integer $bank_id
 * @property integer $currency_id
 *
 * @property Profile[] $profile
 * @property Bank $bank
 * @property Currency $currency
 * @property PayoutType $payoutType
 */
class Wallet extends ActiveRecord
{
    const STATUS_ALLOW = 'allw';
    const STATUS_DISALLOW = 'dsal';
    const REMOVE = 0;

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
            [['payout_type_id', 'bank_id', 'currency_id'], 'required'],
            [['payout_type_id', 'bank_id', 'currency_id'], 'integer'],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['payout_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayoutType::className(), 'targetAttribute' => ['payout_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payout_type_id' => 'Payout Type ID',
            'bank_id' => 'Bank ID',
            'currency_id' => 'Currency ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasMany(Profile::className(), ['wallet_id' => 'id']);
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

    //allow | disallow pack

    public function isAllowed()
    {
        return $this->status;
    }

    public function allow()
    {
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow()
    {
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

    public function remove()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }
}
