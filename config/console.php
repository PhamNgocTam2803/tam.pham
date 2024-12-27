<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','queue'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'queue' => [
            'class' => yii\queue\db\Queue::class,
            'db' => 'db', // Dùng kết nối db
            'tableName' => '{{%queue}}', // Tên bảng trong database
            'channel' => 'default', // Kênh mặc định cho các job
            'mutex' => yii\mutex\MysqlMutex::class, 
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
        'db' => $db,
    ],
    'params' => $params,
    
    'controllerMap' => [
        'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationPath' => null, 
        'migrationNamespaces' => [
            'yii\queue\db\migrations', 
        ],
    ],
    ],
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    // configuration adjustments for 'dev' environment
    // requires version `2.1.21` of yii2-debug module
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
