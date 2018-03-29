<?php


use app\models\User;
use app\modules\leads\models\LeadChannel;
use app\modules\leads\models\LeadForm;
use app\modules\leads\models\LeadLanding;
use app\modules\leads\Module;
use app\modules\product\models\Product;
use app\modules\promocode\models\Promocode;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lead-info-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>Module::t('lead-info','Choose a Client')]) ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'),['prompt'=>Module::t('lead-info','Choose a Product')]) ?>

    <?= $form->field($model, 'lead_channel_id')->dropDownList(ArrayHelper::map(LeadChannel::find()->all(), 'id', 'name'),['prompt'=>Module::t('lead-info','Choose a Channel')]) ?>

    <?= $form->field($model, 'partner_id')->textInput() ?>

    <?= $form->field($model, 'aff_id')->textInput() ?>

    <?= $form->field($model, 'lead_landing_id')->dropDownList(ArrayHelper::map(LeadLanding::find()->all(), 'id', 'name'),['prompt'=>Module::t('lead-info','Choose a Landing')]) ?>

    <?= $form->field($model, 'lead_form_id')->dropDownList(ArrayHelper::map(LeadForm::find()->all(), 'id', 'name'),['prompt'=>Module::t('lead-info','Choose a Form')]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conv_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ga_cid')->textInput() ?>

    <?= $form->field($model, 'utm_medium')->textInput() ?>

    <?= $form->field($model, 'utm_term')->textInput() ?>

    <?= $form->field($model, 'utm_content')->textInput() ?>

    <?= $form->field($model, 'utm_campaign')->textInput() ?>

    <?= $form->field($model, 'promocode_id')->dropDownList(ArrayHelper::map(Promocode::find()->all(), 'id', 'promo_name'),['prompt'=>Module::t('lead-info','Choose a Promocode')]) ?>

    <?= $form->field($model, 'count_orders')->textInput() ?>

    <?= $form->field($model, 'count_sells')->textInput() ?>

    <?= $form->field($model, 'total_lessons')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('lead-info','Create') : Module::t('lead-info','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
