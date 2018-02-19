<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\wallet\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bank', ['create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::button('Create', ['value'=>Url::to('create'), 'class' => 'waves-effect waves-light btn-large', 'id'=>'modalButton']); ?>
    </p>
<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a Bank</h4>',
//        'id'=>'modal',
//        'size'=>'modal-lg',
//    ]);
//
//    echo "<div id='modalContent'></div>";
//
//    Modal::end();

    ?>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
