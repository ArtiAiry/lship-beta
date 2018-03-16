<?php

namespace app\modules\wallet\models;

use app\models\User;
use app\modules\payout\models\PayoutType;
use app\modules\profile\models\Profile;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "wallet".
 *
 * @property integer $id
 * @property string $description
 * @property integer $payout_type_id
 * @property integer $bank_id
 * @property integer $currency_id
 * @property integer $isActive
 * @property integer $isRemoved
 *
 * @property User $user
 * @property Bank $bank
 * @property Currency $currency
 * @property PayoutType $payoutType
 */
class Wallet extends ActiveRecord
{
    const STATUS_ALLOW = 'allw';
    const STATUS_DISALLOW = 'dsal';
    const REMOVE = 0;
//    const INACTIVE = 0;
    const ACTIVE = 1;
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
            [['description'], 'string', 'max' => 255],
            [['isRemoved'], 'string', 'max' => 1],
            [['isActive'], 'string', 'max' => 1],
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
            'payout_type_id' => 'Payout Type',
            'bank_id' => 'Bank',
            'currency_id' => 'Currency',
            'user_id' => 'User',
            'isRemoved' => 'is Removed',
            'isActive' => 'Status',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUsername()
    {
        $this->user->username;
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

    public function isActive()
    {
        return $this->isActive;
    }

    public function activate()
    {
        $this->isActive = self::ACTIVE;
        return $this->save(false);
    }

    public function disactivate()
    {
        $this->isActive = self::REMOVE;
        return $this->save(false);
    }

}
