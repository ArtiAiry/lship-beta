<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\orders\models\OrderInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_status',
            'connect_time:datetime',
//            'create_time',
            'user.username',
            'product.name',
            'current_level',
            //'course_id',
            //'tutor_type_id',
            //'tutor_experience',
            //'connect_method',

            //'frequence',
            //'free_days',
            //'free_times',
            //'goal',
            //'demo_total',
            //'demo_like',
            //'demo_dislike',
            //'demo_absent',
            //'demo_reject',

            //'order_comment',
            //'isRemoved',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
