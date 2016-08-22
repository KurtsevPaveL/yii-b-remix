<?php

use yii\helpers\Html;

$oneExperimentId = $oneExperimentInfo[0]['id_exp'];
$oneExperimentDate = $oneExperimentInfo[0]['date'];
$oneExperimentTime = $oneExperimentInfo[0]['time'];
$oneExperimentThrows = $oneExperimentInfo[0]['throws'];
$oneExperimentName = $oneExperimentInfo[0]['name'];


$this->title = "Show experiment #$oneExperimentId";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container dice">

    <h4>
        <?=
        Html::encode(""
            . " Date: $oneExperimentDate"
            . " Time: $oneExperimentTime"
            . " Throws: $oneExperimentThrows"
            . " Player name: $oneExperimentName"
        )
        ?>
    </h4>

    <?php
    echo "<ul>";
    foreach ($oneExperimentResults as $key => $value) {
        $proportion = round((36000 / $value->countn));
        echo "<li>";
        echo "The sum $value->num felt ";
        echo "$value->countn times. ";
        echo "The proportion is 1/$proportion";
        echo "</li>";
    }
    echo "</ul>";
    ?>

</div>