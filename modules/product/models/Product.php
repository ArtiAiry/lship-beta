<?php

namespace app\modules\product\models;

use app\modules\leads\models\LeadInfo;
use app\modules\orders\models\OrderInfo;
use app\modules\package\models\Package;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 *
 * @property LeadInfo[] $leadInfos
 * @property OrderInfo[] $orderInfos
 * @property Package[] $packages
 */
class Product extends ActiveRecord
{

    const REMOVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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
            'name' => Yii::t('product','Name'),
            'actions' => Yii::t('product','Actions')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadInfos()
    {
        return $this->hasMany(LeadInfo::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Package::className(), ['product_id' => 'id']);
    }

    public function removeProduct()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }
}
