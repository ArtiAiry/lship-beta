<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\payment\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'payment_type_id')->textInput() ?>

    <?= $form->field($model, 'package_id')->textInput() ?>

    <?= $form->field($model, 'lessons')->textInput() ?>

    <?= $form->field($model, 'stock_lessons')->textInput() ?>

    <?= $form->field($model, 'total_lessons')->textInput() ?>

    <?= $form->field($model, 'is_rejected')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn waves-effect waves-light  cyan darken-2' : 'btn waves-effect waves-light light-blue darken-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
