<?php

namespace app\modules\promocode\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "action".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Promocode[] $promocodes
 */
class Action extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action';
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
    public function getPromocodes()
    {
        return $this->hasMany(Promocode::className(), ['action_id' => 'id']);
    }
}
