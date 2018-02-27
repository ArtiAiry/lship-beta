<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\payment\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payment', ['create'], ['class' => 'btn waves-effect waves-light  cyan darken-2']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'create_time',
            'payment_type_id',
            'package_id',
            'lessons',
            // 'stock_lessons',
            // 'total_lessons',
            // 'is_rejected',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
