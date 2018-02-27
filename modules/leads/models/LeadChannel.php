<?php

namespace app\modules\leads\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "lead_channel".
 *
 * @property integer $id
 * @property string $name
 *
 * @property LeadInfo[] $leadInfos
 */
class LeadChannel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lead_channel';
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
    public function getLeadInfos()
    {
        return $this->hasMany(LeadInfo::className(), ['lead_channel_id' => 'id']);
    }
}
