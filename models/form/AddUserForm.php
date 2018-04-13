<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:56
 */

namespace app\models\form;


use app\modules\profile\models\Profile;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use app\models\User;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class AddUserForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $repeat_password;
    public $status;

    public $skype;
    public $first_name;
    public $last_name;
    public $phone;
    public $city;
    public $country;
    public $dob;
    public $age;
    public $ip_address;
    public $gender;





    public function rules()
    {
        return [
            [['first_name','last_name'], 'string', 'max' => 128],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [['username','email','password_hash','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            ['email', 'filter', 'filter' => 'trim'],
            [['email','phone'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['password_hash', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>"Passwords don't match."],
            [['dob'], 'safe'],
            [['skype', 'ip_address', 'phone'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 38],
            [['city'], 'string', 'max' => 178],
            [['gender'], 'string', 'max' => 7],
            [['age'],'integer'],

        ];
    }




    public function user_create()
    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();
            $user->status = 10;

            $user->save();


            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->first_name = $this->first_name;
            $profile->last_name = $this->last_name;
            $profile->ip_address = Yii::$app->request->userIP;
            $profile->skype = $this->skype;
            $profile->phone = $this->phone;
            $profile->country = $this->country;
            $profile->city = $this->city;
            $profile->dob = $this->dob;
            $profile->gender = $this->gender;
            $profile->age = $this->age;

            $user->link('profile', $profile);

            $db = \Yii::$app->db;

            $transaction = $db->beginTransaction();
            if ($user->create() && $profile->save()) {

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;

        }
        return null;

    }

    public function attributeLabels()
    {

        return [
            'id' => Yii::t('app','ID'),
            'user_id' => Yii::t('app','Username'),
            'first_name' => Yii::t('app','First Name'),
            'last_name' => Yii::t('app','Last Name'),
            'fullName' => Yii::t('app','Full Name'),
            'skype' => Yii::t('app','Skype'),
            'phone' => Yii::t('app','Phone'),
            'country' => Yii::t('app','Country'),
            'city' => Yii::t('app','City'),
            'ip_address' => Yii::t('app','Ip Address'),
            'age' => Yii::t('app','Age'),
            'gender' => Yii::t('app','Gender'),
            'dob' => Yii::t('app','Dob'),
            'activity' => Yii::t('app','Activity'),
            'interests' => Yii::t('app','Interests'),
            'email' => Yii::t('app','Email'),
            'password_hash' => Yii::t('app','Password'),
            'repeat_password' => Yii::t('app','Repeat Password'),
            'create_time' => Yii::t('app','Create Time'),
        ];


    }

    public static function getGenderList ()
    {
        return [

            0=>Yii::t('app','Not Set'),
            1=>Yii::t('app','Female'),
            2=>Yii::t('app','Male')

        ];
    }

    public function getGenderValue()
    {
        return $this->gender;
    }



}