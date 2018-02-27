<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\leads\models\LeadInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lead Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lead Info', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Channel', ['/leads/channel/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Form', ['/leads/form/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Landing', ['/leads/landing/create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::button('Create Lead Info', ['value'=>Url::to('create'), 'class' => 'btn btn-success', 'id'=>'modalButton']); ?>
<!--        --><?//= Html::button('Create Channel', ['value'=>Url::to('/leads/channel/create'), 'class' => 'btn btn-success', 'id'=>'modalButton1']); ?>
<!--        --><?//= Html::button('Create Form', ['value'=>Url::to('/leads/form/create'), 'class' => 'btn btn-success', 'id'=>'modalButton2']); ?>
<!--        --><?//= Html::button('Create Landing', ['value'=>Url::to('/leads/landing/create'), 'class' => 'btn btn-success', 'id'=>'modalButton3']); ?>


    </p>

    <!-- modal structure beginning (for create-action buttons)-->

<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a lead</h4>',
//        'id'=>'modal',
//        'size'=>'modal-lg',
//    ]);
//
//    echo "<div id='modalContent'></div>";
//
//    Modal::end();
//
//    ?>
<!---->
<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a channel</h4>',
//        'id'=>'modal1',
//        'size'=>'modal-lg',
//    ]);
//
//    echo "<div id='modalContent1'></div>";
//
//    Modal::end();
//
//    ?>
<!---->
<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a Form</h4>',
//        'id'=>'modal2',
//        'size'=>'modal-lg',
//    ]);
//
//    echo "<div id='modalContent2'></div>";
//
//    Modal::end();
//    ?>
<!---->
<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a Landing</h4>',
//        'id'=>'modal3',
//        'size'=>'modal-lg',
//    ]);
//
//    echo "<div id='modalContent3'></div>";
//
//    Modal::end();
//
//    ?>




    <!-- modal structure ending (for create-action buttons)-->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'create_time',
            'client_id',
            'product_id',
            'lead_channel_id',
            // 'partner_id',
            // 'aff_id',
            // 'lead_landing_id',
            // 'lead_form_id',
            // 'source',
            // 'conv_url:url',
            // 'ga_cid',
            // 'utm_medium',
            // 'utm_term',
            // 'utm_content',
            // 'utm_campaign',
            // 'promocode_id',
            // 'count_orders',
            // 'count_sells',
            // 'total_lessons',

            ['class' => 'app\widgets\CustomColumn'],
        ],
    ]);

//    Modal::begin([
//        'id'=>'pModal',
//        'size'=>'modal-lg',
//    ]);
//    Modal::end();
//    ?>
</div>
