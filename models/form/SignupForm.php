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

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeat_password;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [['username','email','password','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            ['email', 'filter', 'filter' => 'trim'],
            [['email'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match."],

        ];
    }
//    public function signup()
//    {
//        if($this->validate())
//        {
//            $user = new User();
//
//            $user->username = $this->username;
//            $user->email = $this->email;
//            $user->setPassword($this->password);
//
//
//            return $user->create();
//        }
//        return null;
//
//    }
    public function signup()
    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            $user->save();


            $profile = new Profile();

            $profile->user_id = $user->id;

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