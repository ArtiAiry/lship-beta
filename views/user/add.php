<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\form\AddUserForm */
/* @var $profile app\modules\profile\models\Profile */


$this->title = Yii::t('app','Create Account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Profiles'), 'url' => ['/profile/index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(Yii::t('app','Username')) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'age')->textInput() ?>

        <?php $item = $model->getGenderList(); ?>

        <?= $form->field($model, 'gender')->dropDownList($item); ?>

        <?= $form->field($model, 'dob')->textInput(['class'=>'form-control datepicker','id'=>'datetimepicker']);?>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
