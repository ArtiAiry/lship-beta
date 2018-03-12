<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:56
 */

namespace app\models\form;


use app\modules\profile\models\Profile;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use app\modules\user\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $repeat_password;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [['username','email','password_hash','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            ['email', 'filter', 'filter' => 'trim'],
            [['email'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['password_hash', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>"Passwords don't match."],

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
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();

            $user->save();

//            $db = \Yii::$app->profile;

            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->ip_address = Yii::$app->request->userIP;

            $user->link('profile', $profile);

            $transaction = $user->getDb()->beginTransaction();
            if ($user->create() && $profile->save()) {

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;
        }
        return null;

    }
//
//    public function afterSave(){
//
//        //ниже ваш код
//        $wallet = new Wallet();
//        $wallet->id = $this->id;
//        $wallet->save();
//
//
//    }

    public function afterSave($insert, $changedAttributes)
{
    parent::afterSave($insert, $changedAttributes);
    Yii::$app->session->setFlash('success', 'You are signed up.');
}

//    public function afterSave($insert, $changedAttributes)
//    {
//        parent::afterSave($insert, $changedAttributes);
//
//                $user = new User();
//                $user->username = $this->username;
//                $user->email = $this->email;
//                $user->setPassword($this->password);
//                $user->generateAuthKey();
//
//
//    }




}