<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\base\Action;
use yii\base\InvalidParamException;
use yii\console\Controller;
use yii\helpers\Console;

class RbacController extends Controller
{


    public function actionInit($action)
    {


            if (!$this->confirm("Are you sure? It will re-create permissions tree.")) {
                return self::EXIT_CODE_NORMAL;
            }

            $auth = Yii::$app->authManager;

            $manageWallets = $auth->createPermission('manageWallets');
            $manageWallets->description = 'Manage wallets';
            $auth->add($manageWallets);

            $manageUsers = $auth->createPermission('manageUsers');
            $manageUsers->description = 'Manage users';
            $auth->add($manageUsers);

            $banking = $auth->createRole('banking');
            $banking->description = 'Banking';
            $auth->add($banking);
            $auth->addChild($banking, $manageWallets);

            $admin = $auth->createRole('admin');
            $admin->description = 'Administrator';
            $auth->add($admin);
            $auth->addChild($admin, $banking);
            $auth->addChild($admin, $manageUsers);

    }



    public function actionAssign($role, $username)
    {
        $user = User::find()->where(['username' => $username])->one();
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".");
        }

        $auth = Yii::$app->authManager;
        $roleObject = $auth->getRole($role);
        if (!$roleObject) {
            throw new InvalidParamException("There is no role \"$role\".");
        }

        $auth->assign($roleObject, $user->id);
    }
}