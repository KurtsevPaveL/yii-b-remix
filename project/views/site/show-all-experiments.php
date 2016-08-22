<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Show experiments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container dice">

    <h4>
        Please, choose which one of the experiments you want to watch:
    </h4>

    <?php
    foreach ($experimentsAll as $key => $oneExperiment) {
        $id_exp = $oneExperiment->id_exp;
        echo "<ul>";
        $url = Url::to(['show-one-experiment', 'id' => "$id_exp"]);
        echo " <li> <a href='$url'"
            . "/>   Experiment #" . $oneExperiment->id_exp
            . "</a>"
            . " Date " . $oneExperiment->date
            . " Time " . $oneExperiment->time
            . "<br></li>";
        echo "</ul>";
    }
    ?>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>

</div>