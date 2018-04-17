<?php
/* @var $this \yii\web\View */
/* @var $content string */
/* @var $profile /app/models/Profile */
use app\assets\PublicAsset;
use app\widgets\Alert;
use app\widgets\CustomBreadcrumbs;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
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
    <div class="wrapper">
        <?= $this->render('//parts/sidebar')?>
        <div class="main-panel">
            <?= $this->render('//parts/navbar')?>
            <div class="content">
                <?php


                echo '<p> Предыдущий экшен' . " " . Url::previous() . '</p>';

                Url::remember();

                echo '<p> Нынешний экшен' . " " . Url::current() .  '</p>';
//              var_dump(Yii::$app->request->referrer);

                ?>
                <?= CustomBreadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <?= $this->render('//parts/footer')?>
        </div>

    </div>

    <?php

    $this->registerJs("
            var goLockScreen = false;
            var stop = false;
            var autoLockTimer;
            window.onload = resetTimer;
            window.onmousemove = resetTimer;
            window.onmousedown = resetTimer; // catches touchscreen presses
            window.onclick = resetTimer;     // catches touchpad clicks
            window.onscroll = resetTimer;    // catches scrolling with arrow keys
            window.onkeypress = resetTimer;
 
            function lockScreen() {
                stop = true;
                window.location.href = '".\yii\helpers\Url::toRoute(['/site/lock-screen'])."?previous='+encodeURIComponent(window.location.href);
            }
             
            function lockIdentity(){
                goLockScreen = true;
            }
             
            function resetTimer() {
                if(stop==true){
                 
                }
                else if (goLockScreen) {
                    lockScreen();               
                }
                else{
                    clearTimeout(autoLockTimer);
                    autoLockTimer = setTimeout(lockIdentity, 1500*15*60);  // time is in milliseconds                       
                }
                     
            }
        ");

    ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>