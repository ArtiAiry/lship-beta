<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'wallet' => [
            'class' => 'app\modules\wallet\WalletModule',
        ],
        'product' => [
            'class' => 'app\modules\product\ProductModule',
        ],
        'promocode' => [
            'class' => 'app\modules\promocode\PromocodeModule',
        ],
        'package' => [
            'class' => 'app\modules\package\PackageModule',
        ],
        'payment' => [
            'class' => 'app\modules\payment\PaymentModule',
        ],
        'course' => [
            'class' => 'app\modules\course\CourseModule',
        ],
        'tutor_type' => [
            'class' => 'app\modules\tutor_type\TutorTypeModule',
        ],
        'payout' => [
            'class' => 'app\modules\payout\PayoutModule',
        ],
        'notification' => [
            'class' => 'app\modules\notification\NotificationModule',
        ],
        'orders' => [
            'class' => 'app\modules\orders\OrdersModule',
        ],
        'leads' => [
            'class' => 'app\modules\leads\LeadsModule',
        ],
        'tutors' => [
            'class' => 'app\modules\tutors\TutorsModule',
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
        'profile' => [
            'class' => 'app\modules\profile\ProfileModule',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '0YyTLj_c1q1s87dup7te74Xmqhh99z2s',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                    // when admin can edit comments on frontend
                    // Setting unknown property: yii2mod\comments\Module::enableInlineEdit

                ],
                // ...
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'assetManager' => [
            'appendTimestamp' => true,
            'linkAssets' => false,
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.min.css' : 'css/bootstrap.min.css',
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<action>'=>'site/<action>',
                //promocode
                '<module:promocode>/<action:\w+>/<id:\d+>' => '<module>/promocode/<action>',
                '<module:promocode>/<action:\w+>' => '<module>/promocode/<action>',
                //package
                '<module:package>/<action:\w+>/<id:\d+>' => '<module>/package/<action>',
                '<module:package>/<action:\w+>' => '<module>/package/<action>',
                //course
                '<module:course>/<action:\w+>/<id:\d+>' => '<module>/course/<action>',
                '<module:course>/<action:\w+>' => '<module>/course/<action>',
                //payout
                '<module:payout>/<action:\w+>/<id:\d+>' => '<module>/payout/<action>',
                '<module:payout>/<action:\w+>' => '<module>/payout/<action>',
                //payment
                '<module:payment>/<action:\w+>/<id:\d+>' => '<module>/payment/<action>',
                '<module:payment>/<action:\w+>' => '<module>/payment/<action>',
                //wallet
                '<module:wallet>/<action:\w+>/<id:\d+>' => '<module>/wallet/<action>',
                '<module:wallet>/<action:\w+>' => '<module>/wallet/<action>',
                //product
                '<module:product>/<action:\w+>/<id:\d+>' => '<module>/product/<action>',
                '<module:product>/<action:\w+>' => '<module>/product/<action>',
                //tutor_type
                '<module:tutor_type>/<action:\w+>/<id:\d+>' => '<module>/tutor_type/<action>',
                '<module:tutor_type>/<action:\w+>' => '<module>/tutor_type/<action>',
                //notification
                '<module:notification>/<action:\w+>/<id:\d+>' => '<module>/notification/<action>',
                '<module:notification>/<action:\w+>' => '<module>/notification/<action>',
                //comment
//                '<module:comment>/<action:\w+>/<id:\d+>' => '<module>/comment/<action>',
//                '<module:comment>/<action:\w+>' => '<module>/comment/<action>',
//                '<module:action>/<action:\w+>' => '<module>/action/<action>',
                //profile
                '<module:profile>/<action:\w+>/<id:\d+>' => '<module>/profile/<action>',
                '<module:profile>/<action:\w+>' => '<module>/profile/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
