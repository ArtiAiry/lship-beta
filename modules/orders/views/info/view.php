<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\orders\models\OrderInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'create_time',
            'client_id',
            'product_id',
            'current_level',
            'course_id',
            'tutor_type_id',
            'tutor_experience',
            'connect_method',
            'connect_time:datetime',
            'frequence',
            'free_days',
            'free_times',
            'goal',
            'demo_total',
            'demo_like',
            'demo_dislike',
            'demo_absent',
            'demo_reject',
            'order_status',
            'order_comment',
            'isRemoved',
        ],
    ]) ?>


</div>
