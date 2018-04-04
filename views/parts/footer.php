<?php

Use yii\helpers\Url;
?>
<footer class="footer">
            <div class="container">
                <nav>
                    <ul class="footer-menu">
                        <li>
                            <a href="<?=Yii::$app->homeUrl ?>"><?= Yii::t('app','Home')?>

                            </a>
                        </li>
                        <li>
                            <a href="<?=Url::to(['site/about'])?>"><?= Yii::t('app','About')?>

                            </a>
                        </li>
                        <li>
                            <a href="http://skype.airyschool.ru/"><?= Yii::t('app','Our Website')?>

                            </a>
                        </li>
                        <li>
                            <a href="#"><?= Yii::t('app','Blog')?>
     (<?= Yii::t('app','Soon')?>)
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-center">
© <?= date('Y') ?>
                        By <a href="http://www.instagram.com/artur.airy">Airy</a>
</p>
                </nav>
            </div>
        </footer>