<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:56
 */

namespace app\models\form;


use app\models\rbac\AuthAssignment;
use app\modules\leads\models\LeadInfo;
use app\modules\profile\models\Profile;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $repeat_password;
    public $status;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [['username','email','password_hash'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            ['email', 'filter', 'filter' => 'trim'],
            [['email'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['password_hash', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>"Passwords don't match."],

        ];
    }

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

            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->ip_address = Yii::$app->request->userIP;

            $user->link('profile', $profile);

            $wallet = new Wallet();

            $wallet->user_id = $user->id;
            $wallet->description = 'test';

            $user->link('wallet', $wallet);


            $lead_info = new LeadInfo();

            $lead_info->user_id = $user->id;

            $user->link('leadInfos', $lead_info);

            $permission = new AuthAssignment();

            $permission->user_id = $user->id;
            $permission->item_name = 'client';
            $permission->created_at = $user->created_at;

            $permission->save();


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

    public function afterSave($insert, $changedAttributes)
{
    parent::afterSave($insert, $changedAttributes);
    Yii::$app->session->setFlash('success', 'You are signed up.');
}





}