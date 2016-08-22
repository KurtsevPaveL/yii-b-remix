<?php

namespace app\modules\user;

class Module extends \dektrium\user\Module
{

    public $controllerMap = [
        'admin' => 'dektrium\user\controllers\AdminController',
        'security' => 'dektrium\user\controllers\SecurityController',
    ];

}
