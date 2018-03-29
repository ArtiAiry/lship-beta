<?php

namespace app\modules\leads\models;

use app\modules\leads\Module;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "lead_landing".
 *
 * @property integer $id
 * @property string $name
 *
 * @property LeadInfo[] $leadInfos
 */
class LeadLanding extends ActiveRecord
{
    const REMOVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lead_landing';
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
            'name' => Module::t('lead-landing','Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadInfos()
    {
        return $this->hasMany(LeadInfo::className(), ['lead_landing_id' => 'id']);
    }

    public function removeLanding()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }
}
