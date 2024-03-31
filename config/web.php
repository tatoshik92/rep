<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'on beforeRequest' => function ($event) {
            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $url = explode('?', $url);
            $url = $url[0];
            
            if(substr($url, -1) != '/'){
                Yii::$app->getResponse()->redirect($url.'/', 301);
                Yii::$app->end();
            }
        

    },
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'modules' => [
        'acp' => [
            'class' => 'app\modules\acp\Module',
            'layout' => 'acp',
        ]
    ],

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ds*(ds89dIds34sdSJD9SD*7usi8hdjshbdjs()DS89s8d9isudkhsd78^&DuGSDHj767s',
            'baseUrl' => '',
            'enableCsrfValidation' => false,
            'enableCookieValidation' => false,
            // 'csrfParam' => '__Secure-csrf',
            'csrfCookie' => [
                'httpOnly' => true,
                'secure' => true,
            ]
        ],
        'session' => array (
            'cookieParams' => array(
                'httpOnly' => true,
                'secure' => true
            ),
        ),
        'cookies' => [
            'class' => 'yii\web\Cookie',
            'httpOnly' => true,
            'secure' => true
        ],

        't' =>[
            'class' => 'app\components\TComponent'
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity',
                'httpOnly' => true,
                'secure' => true,
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '/',
            'rules' => [
                //User function
                'acp/users/' => 'acp/users/index', // Users list
                'acp/users/create/' => 'acp/users/create', // Users create
                'acp/users/<id:\d+>/' => 'acp/users/views', // Users view
                'acp/users/edit/<id:\d+>/' => 'acp/users/edit', // User edit

                '/acp/departments/<id:\d+>/' => 'acp/departments/view',
                '/acp/departments/edit/<id:\d+>/' => 'acp/departments/edit',

                '/acp/company/<id:\d+>/' => 'acp/company/view',
                '/acp/company/edit/<id:\d+>/' => 'acp/company/edit',


                'vc/<alias>/' => 'vc/index', // get vCard Users
                'assets/<userAlias>' => 'assets/index', // get vCard Users
                '<lang>/assets/<userAlias>' => 'assets/index', // get vCard Users
                '/login/activate/<id>/'=>'login/activate',
                'assets/<userAlias>/login' => 'login/index', // get vCard Users

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
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
