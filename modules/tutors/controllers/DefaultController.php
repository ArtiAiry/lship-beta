<?php

namespace app\modules\tutors\controllers;

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
        return $this->render('index');
    }
}
