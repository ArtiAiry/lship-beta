<?php

namespace app\modules\orders\models;

use app\models\User;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_status_log".
 *
 * @property integer $id
 * @property string $create_time
 * @property integer $creator_id
 * @property integer $order_id
 * @property string $status
 *
 * @property User $order
 */
class OrderStatusLog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_status_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['creator_id', 'order_id'], 'integer'],
            [['status'], 'string', 'max' => 14],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['order_id' => 'id']],
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
            'creator_id' => 'Creator ID',
            'order_id' => 'Order ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(User::className(), ['id' => 'order_id']);
    }
}
