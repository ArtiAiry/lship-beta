<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\Payout */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payout-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payout_type_id')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn waves-effect waves-light  cyan darken-2' : 'btn waves-effect waves-light light-blue darken-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
