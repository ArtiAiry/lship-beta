<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class NotificationsAsset
 *
 * @package webzop\notifications
 */
class NotificationAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/notifications.js',
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/notifications.css',
        'css/light-bootstrap-dashboard-custom.css'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];

}
