<?php

namespace app\modules\payout\models;

use Yii;

/**
 * This is the model class for table "payout".
 *
 * @property integer $id
 * @property integer $payout_type_id
 * @property integer $total
 * @property string $comment
 * @property string $status
 *
 * @property PayoutType $payoutType
 */
class Payout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payout_type_id', 'status'], 'required'],
            [['payout_type_id', 'total'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 9],
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
            'total' => 'Total',
            'comment' => 'Comment',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayoutType()
    {
        return $this->hasOne(PayoutType::className(), ['id' => 'payout_type_id']);
    }
}
