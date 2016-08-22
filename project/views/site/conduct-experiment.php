<?php
/* @var $this yii\web\View */
$this->title = 'Game results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container dice">

    <h4>
        We threw bones 36 000 times, the result is bellow:
    </h4>

    <?php
    echo "<div><ul>";
    foreach ($model->throwResult as $key => $value) {
        $proportion = round(($model->throws / $value));
        echo "<li>Sum of $key felt $value times. The proportion is 1/$proportion</li>";
    }
    echo "</ul></div>";
    ?>

</div>




