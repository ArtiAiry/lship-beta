<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\payment\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'create_time') ?>

    <?= $form->field($model, 'payment_type_id') ?>

    <?= $form->field($model, 'package_id') ?>

    <?= $form->field($model, 'lessons') ?>

    <?php // echo $form->field($model, 'stock_lessons') ?>

    <?php // echo $form->field($model, 'total_lessons') ?>

    <?php // echo $form->field($model, 'is_rejected') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
