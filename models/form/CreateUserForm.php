<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 15.03.2018
 * Time: 13:22
 */

namespace app\models\form;


use app\models\rbac\AuthAssignment;
use app\models\User;
use app\modules\leads\models\LeadInfo;
use app\modules\profile\models\Profile;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;

class CreateUserForm extends Model
{

    //user values

    public $username;
    public $email;
    public $password_hash;
    public $status;

    //profile values

    public $first_name;
    public $last_name;

    //role value

    public $permissions;

    public function rules() {
      return  [
          [['first_name','last_name'], 'string', 'max' => 128],
          ['username', 'filter', 'filter' => 'trim'],
          [['username','permissions'],'required'],
//          ['username', 'required' ,'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'username', 'message'=>"This username has been already token."],
          [['username','email'],'required'],
          [['username'], 'string', 'min'=> 4, 'max'=> 255],
          [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
          ['email', 'filter', 'filter' => 'trim'],
          [['email'], 'trim'],
          ['email', 'string', 'max' => 255],
          ['password_hash', 'string', 'min' => 6],
      ];
    }


    public function roleIdentity($role)
    {

            if($role==1){

                return 'admin';

            }elseif($role==2){

                return 'manager';
            }
    }


//    protected function setRole($id,$roles)
//    {
//        if(!empty($roles))
//        {
//            /** @var \yii\rbac\DbManager $authManager */
//            $authManager = \Yii::$app->get('authManager');
//
//            $authManager->revokeAll($id);
//
//            foreach ($roles as $item)
//            {
//                $r = $authManager->createRole($item);
//                $authManager->assign($r,$id);
//
//            }
//        }
//        else
//        {
//            throw new NotFoundHttpException('Bad Request.');
//        }
//
//    }

//usage
//$this->setRole($id,$_POST['User']['role']);




    public function default_user_create()
    {

        if($this->validate())
        {

            $pw_default = 'qwerty';

            //user object create

            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($pw_default);
            $user->generateAuthKey();
            $user->status = 10;

            $user->save();

            //profile object create

            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->first_name = $this->first_name;
            $profile->last_name = $this->last_name;
            $profile->ip_address = Yii::$app->request->userIP;



            $user->link('profile', $profile);

            //lead info object create

            $lead_info = new LeadInfo();

            $lead_info->user_id = $user->id;

            $user->link('leadInfos', $lead_info);

            //wallet object create

            $wallet = new Wallet();

            $wallet->user_id = $user->id;
            $wallet->description = 'test';

            $user->link('wallet', $wallet);

            //role assignment create

            $permission = new AuthAssignment();

            $permission->user_id = $user->id;
            $permission->item_name = $this->permissions;
            $permission->created_at = $user->created_at;

            $permission->save();


            //db and transaction activating

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