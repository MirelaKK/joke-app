<?php
use yii\helpers\Html;

?>
<div class="joke">
    <h2><?= Html::a($model->title, ['site/category', 'id' => $model->id]) ?></h2>
  	<p><?= $model->joke; ?></p>
</div>



