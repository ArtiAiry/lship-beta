<?php

namespace app\modules\profile\models;


use app\models\User;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $skype
 * @property integer $phone
 * @property string $country
 * @property string $city
 * @property string $ip_address
 * @property integer $age
 * @property string $gender
 * @property string $dob
 * @property string $activity
 * @property string $interests
 *
 * @property User $user
 */
class Profile extends ActiveRecord
{
    /**
     * @inheritdoc
     *
     *
     */

    const REMOVE = 0;

    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'phone', 'age'], 'integer'],
            [['dob'], 'safe'],
            [['first_name','last_name'], 'string', 'max' => 255],
            [['skype', 'ip_address', 'activity', 'interests'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 38],
            [['city'], 'string', 'max' => 178],
            [['gender'], 'string', 'max' => 7],
            [['skype'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'fullName' => 'Full Name',
            'skype' => 'Skype',
            'phone' => 'Phone',
            'country' => 'Country',
            'city' => 'City',
            'ip_address' => 'Ip Address',
            'age' => 'Age',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'activity' => 'Activity',
            'interests' => 'Interests',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

    public function removeProfile()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }


    public static function getGenderList ()
    {
        return [

            0=>'Not Set',
            1=>'Female',
            2=>'Male'

        ];
    }

    public function getGenderValue()
    {
        return $this->gender;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getRole()
    {
        $auth = Yii::$app->authManager;
        $roles = $auth->getRolesByUser($this->id);
        return !empty($roles) ? array_keys($roles)[0] : null;
    }




}
