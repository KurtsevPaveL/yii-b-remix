<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        //
        // starts module user dektrium
        //
        'user' => [
            'class' => 'dektrium\user\Module',
            // starts mailer configurations
            'mailer' => [
                //dektrium mailer starts
                'sender' => 'no-reply@myhost.com', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject' => 'Welcome dude!',
                'confirmationSubject' => 'Zbones. Please confirm your registration',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject' => 'Recovery subject',
                //dektrium mailer ends
            ],
            // ends mailer configurations
            'modelMap' => [
                'RegistrationForm' => 'app\modules\user\models\RegistrationForm',
            ],
//            'controllerMap' => [
//                'user' => 'app\modules\user\UserController'
//            ],
//
            'admins' => ['puper'],
            //
            // ends module user dektrium
            //
        ],
    ],
    'components' => [
        // starts configuring the path to views in our project
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/modules/user/views',
                ],
            ],
        ],
        // ends configuring the path to views in our project
        // starts pretty urls
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
                '<_c:[\w\-]+>' => '<_c>/index',
                '<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
            ],
        ],
        // ends pretty urls
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'F-ksUvFIFNilpFuDsVBQayb0WBKd6HRB',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//       //Basic application user
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        //standart mailer starts
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'p.kurtsev.service@gmail.com',
                'password' => 'p.kurtsev',
                'port' => '587', // Port 25 is a very common port too
                //git status
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
            //standart mailer ends
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
