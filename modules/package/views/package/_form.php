<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\package\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'course_type_id')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'tutor_id')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'left_lessons')->textInput() ?>

    <?= $form->field($model, 'passed_lessons')->textInput() ?>

    <?= $form->field($model, 'total_lessons')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn waves-effect waves-light  cyan darken-2' : 'btn waves-effect waves-light light-blue darken-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
