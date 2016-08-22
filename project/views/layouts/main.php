<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    //FAVICON START
    $url = Url::home();
    echo "<link rel=\"icon\" href=\"$url" . "favicon1.ico\">";
    //FAVICON END
    ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-N6695C"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N6695C');</script>
<!-- End Google Tag Manager -->

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Yii Task 1',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Play', 'url' => ['/site/conduct-experiment']],
            ['label' => 'Show Results', 'url' => ['/site/show-all-experiments']],
            ['label' => 'About', 'url' => ['/site/about']],
//                  //yii-user links start
            Yii::$app->user->isGuest ?
                ['label' => 'Sign in', 'url' => ['/user/security/login']] :
                ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')'
                    , 'url' => ['/user/security/logout']
                    , 'linkOptions' => ['data-method' => 'post']]
//                  //Registration link starts
//                    , ['label' => 'Register'
//                        , 'url' => ['/user/registration/register']
//                        , 'visible' => Yii::$app->user->isGuest]
//                  //Registration link ends
//
//                  //yii-user links ends
//                  //Registration link ends
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        <?= $content ?>
        <a href="http://corp.wamba.com/ru/test/"><img border="0" src="http://corp.wamba.com/ru/test/widget/?id=110045"/></a>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <a href="https://github.com/entityz87">Pavlo Kurtsev</a> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
