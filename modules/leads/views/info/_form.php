<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lead-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'lead_channel_id')->textInput() ?>

    <?= $form->field($model, 'partner_id')->textInput() ?>

    <?= $form->field($model, 'aff_id')->textInput() ?>

    <?= $form->field($model, 'lead_landing_id')->textInput() ?>

    <?= $form->field($model, 'lead_form_id')->textInput() ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conv_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ga_cid')->textInput() ?>

    <?= $form->field($model, 'utm_medium')->textInput() ?>

    <?= $form->field($model, 'utm_term')->textInput() ?>

    <?= $form->field($model, 'utm_content')->textInput() ?>

    <?= $form->field($model, 'utm_campaign')->textInput() ?>

    <?= $form->field($model, 'promocode_id')->textInput() ?>

    <?= $form->field($model, 'count_orders')->textInput() ?>

    <?= $form->field($model, 'count_sells')->textInput() ?>

    <?= $form->field($model, 'total_lessons')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn waves-effect waves-light  cyan darken-2' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
