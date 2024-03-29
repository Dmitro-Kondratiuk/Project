<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' =>'ru',
    'sourceLanguage'=>'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute'=>'category/index',
    'modules' => [
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout'=>'main',
            'defaultRoute'=>'order/index',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',

    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4FUy-PaC-Sh_GRTJNQyDe8yG7BPwbosf',
            'enableCsrfValidation'=>false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
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
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.freesmtpservers.com',
//                'username' => 'kondratyuk.mitya@gmail.com',
//                'password' => 'Proger5328',
                'port' => '25',
//                'encryption' => 'ssl',
            ],
            'useFileTransport' => false,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['ru','en'],
            'enableDefaultLanguageUrlCode'=>true,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>'=>'category/view',
                'category/<id:\d+>'=>'category/view',
                'product/<id:\d+>'=>'product/view',
                'blog/<id:\d+>'=>'blog/view',
                'blog/category/<id:\d+>'=>'blog/category',
                'tag/<id:\d+>'=>'tag/tag',
                'cart/<id:\d+>'=>'cart/add',
                'search'=>'category/search'
            ],
        ],
        'i18n'=>[
            'translations'=>[
                'common*'=>[
                    'class'=>'yii\i18n\PhpMessageSource',
                    'basePath'=>'@app/messages'
                ],
                'content*'=>[
                    'class'=>'yii\i18n\PhpMessageSource',
                    'basePath'=>'@app/messages'
                ],
            ],
        ],

    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'/web',
                'path' => '/upload/global',
                'name' => 'Global'
            ],
//            'watermark' => [
//                'source'         => __DIR__.'/logo.png', // Path to Water mark image
//                'marginRight'    => 5,          // Margin right pixel
//                'marginBottom'   => 5,          // Margin bottom pixel
//                'quality'        => 95,         // JPEG image save quality
//                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//                'targetMinPixel' => 200         // Target image minimum pixel size
//            ]
        ]
    ],
    'params' => $params,
    'on beforeAction'=> function($event){
    $model= \app\modules\admin\models\Menu::find()->with('children.children.children')->one();
    Yii::$app->params['menu'] = $model->getTree();
    }
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1'],
    ];
}

return $config;
