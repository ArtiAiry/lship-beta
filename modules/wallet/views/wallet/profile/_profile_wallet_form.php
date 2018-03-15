<?php

use app\modules\payout\models\PayoutType;
use app\modules\wallet\models\Bank;
use app\modules\wallet\models\Currency;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'payout_type_id')->dropDownList(ArrayHelper::map(PayoutType::find()->all(), 'id', 'name'),['prompt'=>'Choose a Payout Type']); ?>

    <?=  $form->field($model, 'bank_id')->dropDownList(ArrayHelper::map(Bank::find()->all(), 'id', 'name'),['prompt'=>'Choose a Bank']); ?>

    <?=  $form->field($model, 'currency_id')->dropDownList(ArrayHelper::map(Currency::find()->all(), 'id', 'name'),['prompt'=>'Choose a Currency']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>