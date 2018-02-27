<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\orders\models\OrderInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'create_time') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'current_level') ?>

    <?php // echo $form->field($model, 'course_id') ?>

    <?php // echo $form->field($model, 'tutor_type_id') ?>

    <?php // echo $form->field($model, 'tutor_experience') ?>

    <?php // echo $form->field($model, 'connect_method') ?>

    <?php // echo $form->field($model, 'connect_time') ?>

    <?php // echo $form->field($model, 'frequence') ?>

    <?php // echo $form->field($model, 'free_days') ?>

    <?php // echo $form->field($model, 'free_times') ?>

    <?php // echo $form->field($model, 'goal') ?>

    <?php // echo $form->field($model, 'demo_total') ?>

    <?php // echo $form->field($model, 'demo_like') ?>

    <?php // echo $form->field($model, 'demo_dislike') ?>

    <?php // echo $form->field($model, 'demo_absent') ?>

    <?php // echo $form->field($model, 'demo_reject') ?>

    <?php // echo $form->field($model, 'order_status') ?>

    <?php // echo $form->field($model, 'order_comment') ?>

    <?php // echo $form->field($model, 'isRemoved') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
