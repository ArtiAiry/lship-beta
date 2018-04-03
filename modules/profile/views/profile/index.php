<?php

use app\models\User;

use app\modules\profile\models\Profile;
use app\widgets\RoleColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\profile\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';

$this->params['breadcrumbs'][] = $this->title;


\app\widgets\CustomBreadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);
?>
<div class="profile-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile', ['/user/add'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Default Profile', ['/user/create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            [
//                'attribute' => 'user_id',
////              'filter' => User::find()->select('id','username')->indexBy('username')->column(),
//                'value' => 'user.username',
//            ],


            'user.email:email',
            'fullName',
            'skype',
            'phone',
            'country',
            [
                'label'  => 'gender',
                'filter' => Profile::find()->select('id','gender')->indexBy('gender')->column(),
                'value'  => function ($data) {
                    if($data->getGenderValue()==1){
                        return 'Female';
                    }
                    elseif($data->getGenderValue()==2){
                        return 'Male';
                    }else{
                        return 'Not Set';
                    }

                },

            ],

            [
                'label' => 'Lead Info',
                'format' => 'html',
                'value' => function($model) {

                        return Html::a('Edit', ['/leads/info/update', 'id'=>$model->id], ['class' => 'btn btn-primary btn-xs']);


                }
            ],
            [
                'attribute' => 'role',
                'class' => RoleColumn::className(),
                'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'),
            ],

            //'city',
            //'ip_address',
            //'age',
            //'gender',
            //'dob',
            //'activity',
            //'interests',
            //'wallet_id',
            //'isRemoved',

            [
                'class' => 'app\widgets\CustomColumn',
                'header' => 'Actions',
            ],
        ],
    ]); ?>
</div>
