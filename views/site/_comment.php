<?php
use yii\helpers\Html;

?>
<div class="joke-comments">
    <h5 style='color: black'><?= Html::encode($model->submitter) ?></h5>
    <h5 class='comment'><?= Html::encode($model->joke_comment) ?></h5>
    
  	
</div>