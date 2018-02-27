<?php

namespace app\modules\package\models;

use app\models\User;
use app\modules\course\models\Course;
use app\modules\payment\models\Payment;
use app\modules\product\models\Product;
use Yii;

/**
 * This is the model class for table "package".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $product_id
 * @property integer $course_type_id
 * @property integer $duration
 * @property integer $tutor_id
 * @property integer $rate
 * @property integer $left_lessons
 * @property integer $passed_lessons
 * @property integer $total_lessons
 * @property string $comment
 * @property string $status
 * @property integer $isRemoved
 *
 * @property User $client
 * @property Course $courseType
 * @property Product $product
 * @property User $tutor
 * @property Payment[] $payments
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'product_id', 'course_type_id', 'duration', 'tutor_id', 'rate', 'left_lessons', 'passed_lessons', 'total_lessons', 'isRemoved'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 9],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['course_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_type_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['tutor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['tutor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'product_id' => 'Product ID',
            'course_type_id' => 'Course Type ID',
            'duration' => 'Duration',
            'tutor_id' => 'Tutor ID',
            'rate' => 'Rate',
            'left_lessons' => 'Left Lessons',
            'passed_lessons' => 'Passed Lessons',
            'total_lessons' => 'Total Lessons',
            'comment' => 'Comment',
            'status' => 'Status',
            'isRemoved' => 'Is Removed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseType()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_type_id']);
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
    public function getTutor()
    {
        return $this->hasOne(User::className(), ['id' => 'tutor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['package_id' => 'id']);
    }
}
