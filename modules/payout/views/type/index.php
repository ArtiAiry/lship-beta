<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\payout\models\PayoutTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payout Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payout-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--    --><?//= Html::button('Create', ['value'=>Url::to('create'), 'class' => 'btn waves-effect waves-light  cyan darken-2', 'id'=>'modalButton']); ?>
    <p>
<?= Html::a('Create Payout Type', ['create'], ['class' => 'btn waves-effect waves-light  cyan darken-2']) ?>
    </p>
<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a Type</h4>',
//        'id'=>'modal',
//        'size'=>'modal-lg',
//    ]);
//
//    echo "<div id='modalContent'></div>";
//
//    Modal::end();
//
//    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
