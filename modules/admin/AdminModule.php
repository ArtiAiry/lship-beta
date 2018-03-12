<?php

namespace app\modules\admin;


use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\filters\AccessControl;
use Yii;

/**
 * admin module definition class
 */
class AdminModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [AdminRbac::PERMISSION_ADMIN_PANEL],
                    ],
                ],
            ],
        ];
    }



    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }


}
