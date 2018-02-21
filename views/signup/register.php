<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\LoginForm */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

PublicAsset::register($this);

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="full-page-background" style="background-image: url(/web/img/bg6.jpg)">
<div class="wrapper wrapper-full-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="">LessonShip</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item  active ">
                        <a href="<?= Url::toRoute(['signup/index'])?>" class="nav-link">
                            <i class="nc-icon nc-badge"></i> Register
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= Url::toRoute(['auth/login'])?>" class="nav-link">
                            <i class="nc-icon nc-mobile"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
    <div class="full-page register-page section-image" data-color="blue" data-image="<?= Url::to(['/assets/img/bg5.jpg']) ?>">
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-header ">
                        <div class="row  justify-content-center">
                            <div class="col-md-8">
                                <div class="header-text">
                                    <h2 class="card-title">An AS School' Dashboard</h2>
                                    <h4 class="card-subtitle">Register for free and experience the dashboard today</h4>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-circle-09"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>Free Account</h4>
                                        <p>Here you can write a feature description for your dashboard, let the users know what is the value that you give them.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-preferences-circle-rotate"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>Awesome Performances</h4>
                                        <p>Here you can write a feature description for your dashboard, let the users know what is the value that you give them.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-planet"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>Global Support</h4>
                                        <p>Here you can write a feature description for your dashboard, let the users know what is the value that you give them.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mr-auto">
                                <form method="post" action="index">
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'signup-form',
                                        'layout' => 'horizontal',
                                        'fieldConfig' => [
                                            'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
//                                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                        ],
                                    ]); ?>
                                    <div class="card card-plain">
                                        <div class="content">
                                            <div class="form-group">
                                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Your username'])->label(false) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your email'])->label(false) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $form->field($model, 'password_hash')->passwordInput(['placeholder' => 'Your password'])->label(false) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $form->field($model, 'repeat_password')->passwordInput(['placeholder' => 'Repeat password'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <?= Html::submitButton('Create Account', ['class' => 'btn btn-fill btn-neutral btn-wd', 'name' => 'signup-button']) ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?= $this->render('//parts/footer')?>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>




<!---->
<!---->
<!--<div class="leave-comment mr0"><!--leave comment-->
<!--    <div class="row">-->
<!--        <div class="col-md-12 col-md-offset-2">-->
<!--            <div class="site-signup">-->
<!--                <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--                <p>Please fill out the following fields to login:</p>-->
<!---->
<!--                --><?php //$form = ActiveForm::begin([
//                    'id' => 'signup-form',
//                    'layout' => 'horizontal',
//                    'fieldConfig' => [
//                        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
//                    ],
//                ]); ?>
<!---->
<!--                --><?//= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--                --><?//= $form->field($model, 'email')->textInput() ?>
<!---->
<!--                --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--                --><?//= $form->field($model, 'repeat_password')->passwordInput() ?>
<!---->
<!--                <div class="form-group">-->
<!--                    <div class="col-lg-offset-1 col-lg-11">-->
<!--                        --><?//= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                --><?php //ActiveForm::end(); ?>
<!---->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

