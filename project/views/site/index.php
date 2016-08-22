<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Built with straight hands';
$this->params['breadcrumbs'][] = "Welcome!";

$urlSignin = Url::home() . "user/login";
$urlSignup = Url::home() . "user/register";
?>
<div class="site-index dice">

    <div class="jumbotron">

        <h1>Welcome to Zdice!<br></h1>
        <?php
        if (Yii::$app->user->isGuest) {
            echo "<h3> Please <a href= ' $urlSignin'> sign in</a>, </h3>";
            echo "or register <a href = ' $urlSignup '> here</a>";
        }
        if (!Yii::$app->user->isGuest) {
            echo "Click on PLAY!";
        }
        ?>


    </div>

</div>
