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
    public $password;
    public $repeat_password;
    public $status;

    public $skype;
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
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [['username','email','password','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            ['email', 'filter', 'filter' => 'trim'],
            [['email','phone'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match."],
            [['dob'], 'safe'],
            [['skype', 'ip_address', 'phone'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 38],
            [['city'], 'string', 'max' => 178],
            [['gender'], 'string', 'max' => 7],

        ];
    }
    public function user_create()
    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = 10;

            $user->save();


            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->ip_address = Yii::$app->request->userIP;
            $profile->skype = $this->skype;
            $profile->phone = $this->phone;
            $profile->country = $this->country;
            $profile->city = $this->city;
            $profile->dob = $this->dob;

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

}