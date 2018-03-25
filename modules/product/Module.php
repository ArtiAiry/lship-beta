<?php

namespace app\modules\product;
use Yii;

/**
 * product module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\product\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }


    public static function t($category, $message, $params = [], $language = null)
    {
        $path = str_replace('\\', '/', __NAMESPACE__);
        // Add module I18N category.
        if (!isset(Yii::$app->i18n->translations[$category])) {
            Yii::$app->i18n->translations[$category] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@' . $path . '/messages',
                'fileMap' => [
                    $path => $category . '.php',
                ]
            ];
        }

        return Yii::t($category, $message, $params, $language);
    }






}
