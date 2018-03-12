<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\console\Controller;
use app\modules\admin\rbac\Rbac as AdminRbac;

class RbacController extends Controller
{
    public function actionInit()
    {
        if (!$this->confirm("Are you sure? It will re-create permissions tree.")) {
            return self::EXIT_CODE_NORMAL;
        }


        $auth = Yii::$app->getAuthManager();
        $auth->removeAll();

        $auth = Yii::$app->authManager;


        $adminPanel = $auth->createPermission(AdminRbac::PERMISSION_ADMIN_PANEL);
        $adminPanel->description = 'Admin panel';
        $auth->add($adminPanel);

        $manageLessons = $auth->createPermission('manageLessons');
        $manageLessons->description = 'Manage lessons';
        $auth->add($manageLessons);

        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage users';
        $auth->add($manageUsers);

        $teacher = $auth->createRole('teacher');
        $teacher->description = 'Teacher';
        $auth->add($teacher);
        $auth->addChild($teacher, $manageLessons);

        $manager = $auth->createRole('manager');
        $manager->description = 'Manager';
        $auth->add($manager);
        $auth->addChild($manager, $teacher);
        $auth->addChild($manager, $adminPanel);

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);
        $auth->addChild($admin, $manager);
        $auth->addChild($admin, $manageUsers);



        $this->stdout('Done!' . PHP_EOL);
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