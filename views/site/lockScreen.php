<?php
/* @var $this \yii\web\View */
/* @var $profile app\modules\profile\models\Profile */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

PublicAsset::register($this);
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
                    <a class="navbar-brand" href="">LessonShip</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= Url::toRoute(['signup/index'])?>" class="nav-link">
                                <i class="nc-icon nc-badge"></i> Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute(['auth/login'])?>" class="nav-link">
                                <i class="nc-icon nc-mobile"></i> Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="full-page lock-page" data-color="blue" data-image="/web/img/bg4.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-lock text-center card-plain">
                            <div class="card-header ">
                                <div class="author">
                                    <img class="avatar" src="/web/img/marina.jpg" alt="...">
                                </div>
                            </div>
                            <div class="card-body ">
                                <h4 class="card-title"><?= $model->username ?></h4>
                                <h5 class="card-title"><?= $model->login ?></h5>
                                <div class="form-group">
<!--                                    <input type="password" placeholder="Enter Password" class="form-control">-->
                                    <?php
                                    $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        'action' => ['auth/login'],
                                    ]);
                                    echo Html::activeHiddenInput($model, 'login');
                                    ?>
                                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter Password'])->label('') ?>
                                </div>
                            </div>
                            <div class="card-footer ">
<!--                                <a href="#pablo" class="btn btn-info btn-round">Unlock</a>-->
                                <?= Html::submitButton('Unlock', ['class' => 'btn btn-info btn-round', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <footer class="footer">
            <div class="container">
                <nav>
                    <ul class="footer-menu">
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </nav>
            </div>
        </footer>
    </div>
    </div>
    <?php $this->endBody() ?>
      </body>
    </html>
<?php $this->endPage() ?>
