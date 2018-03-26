<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\LoginForm */

use app\assets\AppAsset;
use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);
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
<div class="full-page-background" style="background-image: url(/web/img/bg4.jpg)">
<div class="wrapper wrapper-full-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo">LessonShip</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a href="<?= Url::toRoute(['signup/index'])?>" class="nav-link">
                            <i class="nc-icon nc-badge"></i><?=  Yii::t('app','Register'); ?>
                        </a>
                    </li>
                    <li class="nav-item  active ">
                        <a href="<?= Url::toRoute(['auth/login'])?>" class="nav-link">
                            <i class="nc-icon nc-mobile"></i><?= Yii::t('app','Log in'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="full-page  section-image" data-color="black" data-image="/assets/img/full-screen-image-2.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="post" action="login">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-11\">{error}</div>",
//                                'labelOptions' => ['class' => 'col-lg-1 control-label'],
                            ],
                        ]); ?>
                        <div class="card card-login">
                            <div class="card-header ">
                                <h3 class="header text-center"><?= Yii::t('app','Log in'); ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">


                                        <label><?= Yii::t('app','Login'); ?></label>
                                        <?= $form->field($model, 'login')->textInput(['autofocus' => true, 'placeholder' => Yii::t('app','Enter Username or Email'), 'class'=>'form-control'])->label('') ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?= Yii::t('app','Password');?></label>
                                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app','Enter Password')])->label('') ?>
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <div class="form-check">-->
<!---->
<!--                                            <label class="form-check-label">-->
<!--                                                <input class="form-check-input" type="checkbox" value="">-->
<!---->
<!--                                                <span class="form-check-sign"></span>-->
<!--<!--                                                --><?////= $form->field($model, 'rememberMe')->checkbox(['class'=>'form-check-input'])->label('') ?>
<!--                                                Remember me-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                    --><?//= $form->field($model, 'rememberMe', [
//                                        'template' => "<div class=\"form-check\">{label}</div>\n<div class=\"form-check\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//                                    ])->checkbox([],false) ?>
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-warning btn-wd"><?= Yii::t('app','Log in '); ?></button>
                            </div>
                        </div>
                    </form>
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

