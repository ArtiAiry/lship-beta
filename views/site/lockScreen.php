<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<?php

$form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => ['site/login'],
]); ?>
<?php
echo Html::activeHiddenInput($model, 'email');
?>
    <h1><?= $model->email ?></h1>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'rememberMe')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
    <div style="color:#999;margin:1em 0">
        Logged as someone else ? <?= Html::a('click here', ['auth/login']) ?>.
    </div>
<?php ActiveForm::end(); ?>