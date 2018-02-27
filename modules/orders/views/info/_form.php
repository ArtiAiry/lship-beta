<?php

use app\models\User;
use app\modules\course\models\Course;
use app\modules\tutors\models\TutorType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\profile\models\Profile;
use app\modules\product\models\Product;
/* @var $this yii\web\View */
/* @var $model app\modules\orders\models\OrderInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'), ['prompt'=>'Select User'])?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'), ['prompt'=>'Select Product']) ?>

    <?= $form->field($model, 'current_level')->textInput() ?>

    <?= $form->field($model, 'course_id')->dropDownList(ArrayHelper::map(Course::find()->all(), 'id', 'name'), ['prompt'=>'Select Course']) ?>

    <?= $form->field($model, 'tutor_type_id')->dropDownList(ArrayHelper::map(TutorType::find()->all(), 'id', 'name'), ['prompt'=>'Select a Type']) ?>

    <?= $form->field($model, 'tutor_experience')->textInput() ?>

    <?= $form->field($model, 'connect_method')->textInput() ?>

    <?= $form->field($model, 'connect_time')->textInput() ?>

    <?= $form->field($model, 'frequence')->textInput() ?>

    <?= $form->field($model, 'free_days')->textInput() ?>

    <?= $form->field($model, 'free_times')->textInput() ?>

    <?= $form->field($model, 'goal')->textInput() ?>

    <?= $form->field($model, 'demo_total')->textInput() ?>

    <?= $form->field($model, 'demo_like')->textInput() ?>

    <?= $form->field($model, 'demo_dislike')->textInput() ?>

    <?= $form->field($model, 'demo_absent')->textInput() ?>

    <?= $form->field($model, 'demo_reject')->textInput() ?>

    <?= $form->field($model, 'order_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
