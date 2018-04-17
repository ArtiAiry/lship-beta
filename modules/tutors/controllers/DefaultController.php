<?php

namespace app\modules\tutors\controllers;

use app\modules\profile\models\Profile;
use yii\web\Controller;

/**
 * Default controller for the `tutors` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $profiles = Profile::find()->orderBy('id asc')->all();;

        return $this->render('index',[
            'profiles' => $profiles,

        ]);
    }
}
