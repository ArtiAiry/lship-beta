<?php

use app\modules\leads\Module;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\leads\models\LeadLandingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('lead-landing','Lead Landings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-landing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Lead Landing', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::button(Module::t('lead-landing','Create Landing'), ['value'=>Url::to('create'), 'class' => 'btn btn-success', 'id'=>'modalButton']); ?>
    </p>
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
    ]); ?>


    <?php
    digitv\bootstrap\widgets\Modal::begin([
        'header'=>'<h4>'.Module::t("lead-landing","Add a Landing").'</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    digitv\bootstrap\widgets\Modal::end();

    ?>

</div>
