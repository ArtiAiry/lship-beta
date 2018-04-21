<?php

namespace app\widgets;

use app\assets\NotificationAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\db\Query;
use webzop\notifications\NotificationsAsset;


class Notifications extends \yii\base\Widget
{

    public $options = ['class' => 'dropdown nav-notifications nav-item'];

    /**
     * @var string the HTML options for the item count tag. Key 'tag' might be used here for the tag name specification.
     * For example:
     *
     * ```php
     * [
     *     'tag' => 'span',
     *     'class' => 'badge badge-warning',
     * ]
     * ```
     */
    public $countOptions = [];

    /**
     * @var array additional options to be passed to the notification library.
     * Please refer to the plugin project page for available options.
     */
    public $clientOptions = [];
    /**
     * @var integer the XHR timeout in milliseconds
     */
    public $xhrTimeout = 2000;
    /**
     * @var integer The delay between pulls in milliseconds
     */
    public $pollInterval = 60000;

    public function init()
    {
        parent::init();

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo $this->renderNavbarItem();

        $this->registerAssets();
    }

    /**
     * @inheritdoc
     */
    protected function renderNavbarItem()
    {



        $html  = Html::beginTag('li', $this->options);
        $html .= Html::beginTag('a', ['href' => '#', 'class' => 'dropdown-toggle nav-link', 'data-toggle' => 'dropdown']);
        $html .= Html::tag('i', '', ['class' => 'nc-icon nc-bell-55']);

//        $html .= Html::endTag('span');
        $count = self::getCountUnseen();
        $countOptions = array_merge([
            'tag' => 'span',
            'data-count' => $count,
        ], $this->countOptions);
        Html::addCssClass($countOptions, 'notification');


        if(!$count){
            $countOptions['style'] = 'display: none;';
        }
        $countTag = ArrayHelper::remove($countOptions, 'tag', 'span');


        $html .= Html::tag($countTag, $count, $countOptions);

        $html .= Html::tag('span',Yii::t('app','New Notifications'),['class'=>'d-lg-none']);

        $html .= Html::endTag('a');
        $html .= Html::begintag('div', ['class' => 'dropdown-menu dropdown-menu-right']);
        $header = Html::a(Yii::t('app', 'Mark all as read'), '#', ['class' => 'read-all pull-right']);
        $header .= Html::tag('span',Yii::t('app', 'Notifications'));
        $html .= Html::tag('div', $header, ['class' => 'header']);

        $html .= Html::begintag('div', ['class' => 'notifications-list']);

        //uncomment

        $html .= Html::tag('div', '<span class="ajax-loader"></span>', ['class' => 'loading-row']);

        //uncomment


        $html .= Html::tag('div', Html::tag('span', Yii::t('app', 'There are no notifications to show'), ['style' => 'display: none;']), ['class' => 'empty-row']);
        $html .= Html::endTag('div');

        $html .= Html::begintag('div',['class'=>'divider']);
        $html .= Html::endTag('div');


        $html .= Html::beginTag('a', ['href' => '/notifications/default/index', 'class' => 'dropdown-item',]);
        $html .=  Yii::t('app', 'View all');
//        $html .= Html::a(Yii::t('app', 'View all'), ['/notifications/default/index'],['class'=>'dropdown-item']);
        $html .= Html::tag('i', '', ['class' => 'nc-icon nc-notes']);
        $html .= Html::endTag('a');
        $html .= Html::endTag('li');

        return $html;
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $this->clientOptions = array_merge([
            'id' => $this->options['id'],
            'url' => Url::to(['/notifications/default/list']),
            'countUrl' => Url::to(['/notifications/default/count']),
            'readUrl' => Url::to(['/notifications/default/read']),
            'readAllUrl' => Url::to(['/notifications/default/read-all']),
            'xhrTimeout' => Html::encode($this->xhrTimeout),
            'pollInterval' => Html::encode($this->pollInterval),
        ], $this->clientOptions);

        $js = 'Notifications(' . Json::encode($this->clientOptions) . ');';
        $view = $this->getView();

        NotificationAsset::register($view);

        $view->registerJs($js);
    }

    public static function getCountUnseen(){
        $userId = Yii::$app->getUser()->getId();
        $count = (new Query())
            ->from('{{%notifications}}')
            ->andWhere(['or', 'user_id = 0', 'user_id = :user_id'], [':user_id' => $userId])
            ->andWhere(['seen' => false])
            ->count();
        return $count;
    }

}
