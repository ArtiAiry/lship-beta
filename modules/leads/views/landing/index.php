<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\leads\models\LeadLandingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lead Landings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-landing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lead Landing', ['create'], ['class' => 'btn btn-success']) ?>
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
</div>
