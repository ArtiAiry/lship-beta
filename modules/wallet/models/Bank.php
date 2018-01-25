<?php

namespace app\modules\wallet\models;

use yii\db\ActiveRecord;


/**
 * This is the model class for table "bank".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Wallet[] $wallets
 */
class Bank extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
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
    public function getWallets()
    {
        return $this->hasMany(Wallet::className(), ['bank_id' => 'id']);
    }
}
