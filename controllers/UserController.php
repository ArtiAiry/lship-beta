<?php
/**
 * Created by PhpStorm.
 * User: NB3
 * Date: 12.02.2018
 * Time: 13:07
 */

namespace app\controllers;


use app\models\form\AddUserForm;
use app\models\User;
use app\modules\profile\models\Profile;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{


    public function actionAdd()
    {
        $model = new AddUserForm();


        if ($model->load(Yii::$app->request->post())) {
//            echo '<pre>';
//            var_dump($model);
//            echo '</pre>';
            if($model->user_create()){
                return $this->redirect(['profile/index']);
            }
            return var_dump($model);

        }

        return $this->render('add', [

            'model' => $model,
        ]);
    }

    public function actionTracking()
    {

        $model1 = new User();
        $model1->id = 3;
        $model1->username = 'lol';
        $model1->auth_key = 43434;
        $model1->password = 434342;
        $model1->status = 10;

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