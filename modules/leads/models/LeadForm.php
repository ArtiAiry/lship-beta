<?php

namespace app\modules\leads\models;

use app\modules\leads\Module;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "lead_form".
 *
 * @property integer $id
 * @property string $name
 *
 * @property LeadInfo[] $leadInfos
 */
class LeadForm extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lead_form';
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
            'name' => Module::t('lead-form','Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadInfos()
    {
        return $this->hasMany(LeadInfo::className(), ['lead_form_id' => 'id']);
    }
}
