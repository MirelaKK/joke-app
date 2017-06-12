<?php

/* @var $this yii\web\View */

$this->title = 'Naslovna';
?>
<div class="site-index">
    <h3 style="color: black">Vic dana</h3>
    <hr>
   
<?= $joke_of_day ?>
    <br>
    <br>
    <h3 style="color: black">Najnoviji vicevi</h3>
    <hr>
<?= $new_jokes ?>

</div>
