<?php

use app\models\User;

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
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'user_id',
//                'filter' => User::find()->select('id','username')->indexBy('username')->column(),
                'value' => 'user.username',
            ],

            'skype',
            'phone',
            'country',
            //'city',
            //'ip_address',
            //'age',
            //'gender',
            //'dob',
            //'activity',
            //'interests',
            //'wallet_id',
            //'isRemoved',

            ['class' => 'app\widgets\CustomColumn'],
        ],
    ]); ?>
</div>
