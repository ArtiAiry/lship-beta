<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\package\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Package', ['create'], ['class' => 'btn waves-effect waves-light  cyan darken-2']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_id',
            'product_id',
            'course_type_id',
            'duration',
            // 'tutor_id',
            // 'rate',
            // 'left_lessons',
            // 'passed_lessons',
            // 'total_lessons',
            // 'comment',
            // 'status',
            // 'isRemoved',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
