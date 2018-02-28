<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\leads\models\LeadFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lead Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lead Form', ['create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::button('Create Form', ['value'=>Url::to('create'), 'class' => 'btn btn-success', 'id'=>'modalButton']); ?>
    </p>

<!--    --><?php
//    Modal::begin([
//        'header'=>'<h4>Add a form</h4>',
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
            'name',
            [
                'class' => 'app\widgets\CustomColumn',
                'header' => 'Actions',
            ],
        ],
    ]);

//    Modal::begin([
//        'id'=>'pModal',
//        'size'=>'modal-lg',
//    ]);
//    Modal::end();


    ?>


</div>
