<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\tutors\models\TutorTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tutor Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Tutor Type', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Create', ['value'=>Url::to('create'), 'class' => 'btn waves-effect waves-light  cyan darken-2', 'id'=>'modalButton']); ?>
    </p>
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
