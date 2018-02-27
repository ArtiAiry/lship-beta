<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
        <?= Html::a('Create Order Info', ['create'], ['class' => 'btn waves-effect waves-light  cyan darken-2']) ?>
    </p>
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'create_time',
//            'client_id',
//            'product_id',
//            'current_level',
//            // 'course_id',
//            // 'tutor_type_id',
//            // 'tutor_experience',
//            // 'connect_method',
//            // 'connect_time:datetime',
//            // 'frequence',
//            // 'free_days',
//            // 'free_times',
//            // 'goal',
//            // 'demo_total',
//            // 'demo_like',
//            // 'demo_dislike',
//            // 'demo_absent',
//            // 'demo_reject',
//            // 'order_status',
//            // 'order_comment',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
    <?php if(!empty($orders)): ?>
        <table class="hoverable">
            <thead>
            <tr>
                <td>#</td>
                <td>Client</td>
                <td>Product ID</td>
                <td>Creation Time</td>
                <td>Current Level</td>
                <td>Goal</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
        <?php foreach($orders as $order):?>
        <?php if($order->isRemoved()):?>
            <tr>
                <td><?= $order->id?></td>
                <td><?= $order->client_id ?></td>
                <td><?= $order->product_id ?></td>
                <td><?= $order->create_time ?></td>
                <td><?= $order->current_level ?></td>
                <td><?= $order->goal ?></td>
                <td>
                    <a href="<?= Url::toRoute(['info/view','id'=>$order->id]);?>" title="View" aria-label="View"><span class="mdi-action-visibility"></span></a>
                    <a href="<?= Url::toRoute(['info/update','id'=>$order->id]);?>" title="Update" aria-label="Update"><span class="mdi-content-create"></span></a>
                    <a href="<?= Url::toRoute(['info/delete','id'=>$order->id]);?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="mdi-content-clear"></span></a>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif;?>



</div>
