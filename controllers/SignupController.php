<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:52
 */

namespace app\controllers;
use app\modules\profile\models\Profile;
use app\models\User;
use app\models\form\SignupForm;
use Yii;
use yii\web\Controller;

class SignupController extends Controller
{
    public function actionIndex()
    {
        $model = new SignupForm();
//       var_dump(Yii::$app->request->post());
        if(Yii::$app->request->post())
        {
            $model->load(Yii::$app->request->post());
            if($user = $model->signup())
            {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                } else {
                    return $this->redirect(['auth/login']);
                }

            }
        }
        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function actionTracking()
    {
        $model1 = new User();
        $model1->username = 'lol';
        $model1->save();

        $model2 = new Profile();
        $model2->user_id = $model1->id;
        $model2->city = 'Praga';
        $model1->link('profile', $model2);
        $db = \Yii::$app->db;
        $transaction = $db->beginTransaction();
        if ($model1->save() && $model2->save()) {

            $transaction->commit();
        } else {
            $transaction->rollback();
        }
        return "hello";
    }
}