<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lead-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'create_time') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'lead_channel_id') ?>

    <?php // echo $form->field($model, 'partner_id') ?>

    <?php // echo $form->field($model, 'aff_id') ?>

    <?php // echo $form->field($model, 'lead_landing_id') ?>

    <?php // echo $form->field($model, 'lead_form_id') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'conv_url') ?>

    <?php // echo $form->field($model, 'ga_cid') ?>

    <?php // echo $form->field($model, 'utm_medium') ?>

    <?php // echo $form->field($model, 'utm_term') ?>

    <?php // echo $form->field($model, 'utm_content') ?>

    <?php // echo $form->field($model, 'utm_campaign') ?>

    <?php // echo $form->field($model, 'promocode_id') ?>

    <?php // echo $form->field($model, 'count_orders') ?>

    <?php // echo $form->field($model, 'count_sells') ?>

    <?php // echo $form->field($model, 'total_lessons') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
