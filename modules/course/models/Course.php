<?php

namespace app\modules\course\models;

use app\modules\orders\models\OrderInfo;
use app\modules\package\models\Package;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $name
 *
 * @property OrderInfo[] $orderInfos
 * @property Package[] $packages
 */
class Course extends ActiveRecord
{
    const STATUS_ALLOW = 'allw';
    const STATUS_DISALLOW = 'dsal';
    const REMOVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
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
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Package::className(), ['course_type_id' => 'id']);
    }

    //allow | disallow pack

    public function isAllowed()
    {
        return $this->status;
    }

    public function allow()
    {
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow()
    {
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

    public function remove()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }
}
