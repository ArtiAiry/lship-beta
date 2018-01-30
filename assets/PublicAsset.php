<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/light-bootstrap-dashboard.css',
        'css/demo.css',

    ];
    public $js = [
        'js/core/popper.min.js',
        'js/core/bootstrap.min.js',

        'js/demo.js',
        'js/plugins/moment.min.js',
        'js/plugins/nouislider.js',
        'js/plugins/bootstrap-notify.js',
        'js/plugins/bootstrap-switch.js',
        'js/plugins/bootstrap-table.js',
        'js/plugins/bootstrap-datetimepicker.js',
        'js/plugins/bootstrap-selectpicker.js',
        'js/plugins/jquery.bootstrap-wizard.js',
        'js/plugins/fullcalendar.min.js',
        'js/plugins/perfect-scrollbar.jquery.min.js',
        'js/plugins/jquery-jvectormap.js',
        'js/plugins/jquery.validate.min.js',
        'js/plugins/jquery.dataTables.min.js',

        'js/plugins/sweetalert2.min.js',
        'js/light-bootstrap-dashboard.js?v=2.0.1',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
