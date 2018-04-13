<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\form\CreateUserForm */
/* @var $profile app\modules\profile\models\Profile */
/* @var $user app\models\User */


$this->title = Yii::t('app','Create Account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Profiles'), 'url' => ['/profile/index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="profile-default-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permissions')->dropDownList(ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'), ['prompt' => Yii::t('app','Select Item')])->label(Yii::t('app','Role')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Create'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
