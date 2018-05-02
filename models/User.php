<?php

namespace app\models;

use app\modules\leads\models\LeadInfo;
use app\modules\orders\models\OrderInfo;
use app\modules\orders\models\OrderStatusLog;
use app\modules\package\models\Package;
use app\modules\profile\models\Profile;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $create_time
 *
 * @property LeadInfo[] $leadInfo
 * @property Notification[] $notifications
 * @property OrderInfo[] $orderInfos
 * @property OrderStatusLog[] $orderStatusLogs
 * @property Package[] $packages
 * @property Package[] $packages0
 * @property Profile[] $profile
 * @property Wallet[] $wallet
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 128],
            [['email'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'username' => Yii::t('app','Username'),
            'email' => Yii::t('app','Email'),
            'password_hash' =>  Yii::t('app','Password'),
            'created_at' => Yii::t('app','Create Time'),
            'updated_at' => Yii::t('app','Update Time')
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }



    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->auth_key;
    }


    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentUsers()
    {
        return $this->hasMany(CommentUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comment::className(), ['id' => 'comment_id'])->viaTable('comment_user', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadInfos()
    {
        return $this->hasMany(LeadInfo::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatusLogs()
    {
        return $this->hasMany(OrderStatusLog::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackagesClients()
    {
        return $this->hasMany(Package::className(), ['client_id' => 'id']); //for clients
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackagesTutors()
    {
        return $this->hasMany(Package::className(), ['tutor_id' => 'id']); //for tutors
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
    }


    public function getWallet()
    {
        return $this->hasMany(Wallet::className(), ['user_id' => 'id']);
    }

    //findBy methods


    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByEmailOrUsername($login)
    {
        return User::find()->andWhere(['or', ['username' => $login], ['email' => $login]])->one();
    }


    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public function validatePassword($password_hash)
    {
        return Yii::$app->security->validatePassword($password_hash, $this->password_hash);
    }

    public function setPassword($password_hash)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password_hash);
    }

    //save-create method for signup form, where your data save to database.


    public function create()
    {
        return $this->save(false);
    }

    public function getProfileComments()
    {
        return $this->getComments()->where(['is_removed'=>'0'])->all();
    }

    //generation keys

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function isRemoved()
    {
        return $this->status;
    }

    public function removeUser()
    {
        $this->status = self::STATUS_DELETED;
        return $this->save(false);
    }


    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
        } else {
            // Нет, старая (update)
        }
        parent::afterSave($insert, $changedAttributes);
    }


    // getting Roles

    public function getRole()
    {
        $auth = Yii::$app->authManager;
        $roles = $auth->getRolesByUser($this->id);
        return !empty($roles) ? array_keys($roles)[0] : null;
    }


    public function getRoleName()
    {

        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());

        foreach ($roles as $role){

            echo $role->description;
        }

    }

    public function getRoleNameLabel()
    {
        if($this->getRoleName() == 'Client'){

            echo "alert alert-success";

        } else {
            return "alert alert-danger";
        }


    }


    public function removeUserProfile()
    {
        $this->leadInfo->isRemoved = self::STATUS_DELETED;
        $this->profile->isRemoved = self::STATUS_DELETED;
        $this->wallet->isRemoved = self::STATUS_DELETED;
        $this->status = self::STATUS_DELETED;
        return $this->save(false);
    }


}
