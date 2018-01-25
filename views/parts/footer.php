<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 27.12.2017
 * Time: 17:58
 */
Use yii\helpers\Url;

?>
<footer class="footer">
            <div class="container">
                <nav>
                    <ul class="footer-menu">
                        <li>
                            <a href="<?=Yii::$app->homeUrl ?>">
    Home
                            </a>
                        </li>
                        <li>
                            <a href="<?=Url::to(['site/about'])?>">
    About
                            </a>
                        </li>
                        <li>
                            <a href="http://skype.airyschool.ru/">
    Our Site
                            </a>
                        </li>
                        <li>
                            <a href="#">
    Blog (Soon, maybe)
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-center">
© <?= date('Y') ?>
<!--                        <script>-->
<!--document.write(new Date().getFullYear()) -->
<!--                        </script>-->
                        By <a href="http://www.instagram.com/artur.airy">Airy</a>
</p>
                </nav>
            </div>
        </footer>