<?php

namespace app\modules\payout\models;

use app\modules\wallet\models\Wallet;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payout_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Payout[] $payouts
 * @property Wallet[] $wallets
 */
class PayoutType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payout_type';
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
    public function getPayouts()
    {
        return $this->hasMany(Payout::className(), ['payout_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallets()
    {
        return $this->hasMany(Wallet::className(), ['payout_type_id' => 'id']);
    }
}
