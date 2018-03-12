<?php

namespace app\modules\leads\models;

use app\modules\user\models\User;
use app\modules\product\models\Product;
use app\modules\promocode\models\Promocode;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "lead_info".
 *
 * @property integer $id
 * @property string $create_time
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $lead_channel_id
 * @property integer $partner_id
 * @property integer $aff_id
 * @property integer $lead_landing_id
 * @property integer $lead_form_id
 * @property string $source
 * @property string $conv_url
 * @property integer $ga_cid
 * @property integer $utm_medium
 * @property integer $utm_term
 * @property integer $utm_content
 * @property integer $utm_campaign
 * @property integer $promocode_id
 * @property integer $count_orders
 * @property integer $count_sells
 * @property integer $total_lessons
 *
 * @property User $user
 * @property LeadChannel $leadChannel
 * @property LeadForm $leadForm
 * @property LeadLanding $leadLanding
 * @property Product $product
 * @property Promocode $promocode
 */
class LeadInfo extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lead_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['user_id', 'product_id', 'lead_channel_id', 'partner_id', 'aff_id', 'lead_landing_id', 'lead_form_id', 'ga_cid', 'utm_medium', 'utm_term', 'utm_content', 'utm_campaign', 'promocode_id', 'count_orders', 'count_sells', 'total_lessons'], 'integer'],
            [['source', 'conv_url'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['lead_channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadChannel::className(), 'targetAttribute' => ['lead_channel_id' => 'id']],
            [['lead_form_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadForm::className(), 'targetAttribute' => ['lead_form_id' => 'id']],
            [['lead_landing_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadLanding::className(), 'targetAttribute' => ['lead_landing_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['promocode_id'], 'exist', 'skipOnError' => true, 'targetClass' => Promocode::className(), 'targetAttribute' => ['promocode_id' => 'id']],
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
            'user_id' => 'Client',
            'product_id' => 'Product',
            'lead_channel_id' => 'Lead Channel',
            'partner_id' => 'Partner ID',
            'aff_id' => 'Aff ID',
            'lead_landing_id' => 'Lead Landing',
            'lead_form_id' => 'Lead Form',
            'source' => 'Source',
            'conv_url' => 'Conv Url',
            'ga_cid' => 'Ga Cid',
            'utm_medium' => 'Utm Medium',
            'utm_term' => 'Utm Term',
            'utm_content' => 'Utm Content',
            'utm_campaign' => 'Utm Campaign',
            'promocode_id' => 'Promocode',
            'count_orders' => 'Count Orders',
            'count_sells' => 'Count Sells',
            'total_lessons' => 'Total Lessons',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadChannel()
    {
        return $this->hasOne(LeadChannel::className(), ['id' => 'lead_channel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadForm()
    {
        return $this->hasOne(LeadForm::className(), ['id' => 'lead_form_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadLanding()
    {
        return $this->hasOne(LeadLanding::className(), ['id' => 'lead_landing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromocode()
    {
        return $this->hasOne(Promocode::className(), ['id' => 'promocode_id']);
    }
}
