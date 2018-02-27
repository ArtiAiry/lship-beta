<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\orders\models\OrderStatusLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Status Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-status-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Status Log', ['create'], ['class' => 'btn waves-effect waves-light  cyan darken-2']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'create_time',
            'creator_id',
            'order_id',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
