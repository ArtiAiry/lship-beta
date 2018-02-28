<?php

namespace app\modules\promocode\models;


use app\modules\leads\models\LeadInfo;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "promocode".
 *
 * @property integer $id
 * @property string $promo_name
 * @property integer $action_id
 *
 * @property LeadInfo[] $leadInfos
 * @property Action $action
 */
class Promocode extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promocode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promo_name'], 'required'],
            [['action_id'], 'integer'],
            [['promo_name'], 'string', 'max' => 128],
            [['promo_name'], 'unique'],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => Action::className(), 'targetAttribute' => ['action_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'promo_name' => 'Name',
            'action_id' => 'Action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadInfos()
    {
        return $this->hasMany(LeadInfo::className(), ['promocode_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(Action::className(), ['id' => 'action_id']);
    }
}
