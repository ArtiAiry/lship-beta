<?php


namespace app\models\notification;

use app\models\User;
use app\modules\profile\models\Profile;
use webzop\notifications\Notification;
use Yii;

class AccountNotification extends Notification
{

    const KEY_NEW_ACCOUNT = 'new_account';

    const KEY_RESET_PASSWORD = 'reset_password';

    /**
     * @var \app\models\User the user object
     */
    public $user;
    /**
     * @var \app\modules\profile\models\Profile the profile object
     */
    public $profile;
    /**
     * @inheritdoc
     */

    public function getTitle(){

        $model = User::find()->max('id');

        switch($this->key){
            case self::KEY_NEW_ACCOUNT:
                return Yii::t('app', 'New account {profile} created', ['profile' => '#'.$model]);
        }
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){


        $model = User::find()->max('id');

        return ['/profile/view', 'id' => $model];
    }


}