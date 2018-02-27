<?php

namespace app\modules\payment\models;

use app\modules\package\models\Package;


/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property string $create_time
 * @property integer $payment_type_id
 * @property integer $package_id
 * @property integer $lessons
 * @property integer $stock_lessons
 * @property integer $total_lessons
 * @property integer $is_rejected
 *
 * @property Package $package
 * @property PaymentType $paymentType
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['payment_type_id', 'package_id', 'lessons', 'stock_lessons', 'total_lessons', 'is_rejected'], 'integer'],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Package::className(), 'targetAttribute' => ['package_id' => 'id']],
            [['payment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentType::className(), 'targetAttribute' => ['payment_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_time' => 'Create Time',
            'payment_type_id' => 'Payment Type ID',
            'package_id' => 'Package ID',
            'lessons' => 'Lessons',
            'stock_lessons' => 'Stock Lessons',
            'total_lessons' => 'Total Lessons',
            'is_rejected' => 'Is Rejected',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Package::className(), ['id' => 'package_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentType::className(), ['id' => 'payment_type_id']);
    }
}
