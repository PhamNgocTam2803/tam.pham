<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UML3Yaqcwpz-qs6C-GyC1Kz1oMRvMzGc',
        ],
        'queue' => [
            'class' => yii\queue\db\Queue::class,
            'db' => 'db', // Dùng kết nối db
            'tableName' => '{{%queue}}', // Tên bảng trong database
            'channel' => 'default', // Kênh mặc định cho các job
            'mutex' => yii\mutex\MysqlMutex::class, 
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', // Máy chủ SMTP của công ty
                'username' => 'tam.pham@beready.academy', // Địa chỉ email của bạn
                'password' => $_ENV['MAIL_PASSWORD'], // App password email
                'port' => 465, // Cổng SMTP (hoặc 465 cho SSL)
                'encryption' => 'ssl', // Phương thức mã hóa (TLS hoặc SSL)
                'scheme' => 'smtp', 
            ],

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
             'rules' => [
                'lien-he' => 'site/contact'
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
