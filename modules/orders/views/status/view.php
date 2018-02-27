<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\orders\models\OrderStatusLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Status Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-status-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn waves-effect waves-light light-blue darken-4']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn waves-effect waves-light red darken-4',
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
            'creator_id',
            'order_id',
            'status',
        ],
    ]) ?>

</div>
