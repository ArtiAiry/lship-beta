<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 15.03.2018
 * Time: 13:22
 */

namespace app\models\form;


use app\models\User;
use app\modules\leads\models\LeadInfo;
use app\modules\profile\models\Profile;
use Yii;
use yii\base\Model;

class CreateUserForm extends Model
{

    //user values

    public $username;
    public $email;
    public $password_hash;
    public $repeat_password;
    public $status;


    //profile values


    public $first_name;
    public $last_name;


    public function rules() {
      return  [
          [['first_name','last_name'], 'string', 'max' => 128],
          ['username', 'filter', 'filter' => 'trim'],
          ['username', 'required'],
          [['username','email'],'required'],
          [['username'], 'string', 'min'=> 4, 'max'=> 255],
          [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
          ['email', 'filter', 'filter' => 'trim'],
          [['email'], 'trim'],
          ['email', 'string', 'max' => 255],
          ['password_hash', 'string', 'min' => 6],
      ];
    }


    public function default_user_create()
    {

        if($this->validate())
        {

            $pw_default = 'qwerty';

            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($pw_default);
            $user->generateAuthKey();
            $user->status = 10;

            $user->save();

            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->first_name = $this->first_name;
            $profile->last_name = $this->last_name;
            $profile->ip_address = Yii::$app->request->userIP;

            $user->link('profile', $profile);

            $lead_info = new LeadInfo();

            $lead_info->user_id = $user->id;

            $user->link('leadInfos', $lead_info);


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