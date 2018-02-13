<?php
use app\modules\profile\models\Profile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $user app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-group">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'phone')->textInput() ?>

    <?= $form->field($profile, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'age')->textInput() ?>



    <?php $item = $profile->getGenderList();
?>

    <?= $form->field($profile, 'gender')->dropDownList($item)->label(''); ?>

    <?= $form->field($profile, 'dob')->textInput(['class'=>'form-control datepicker','id'=>'datetimepicker']);?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>