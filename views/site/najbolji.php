<?php

/* @var $this yii\web\View */

$this->title = 'Vicevi';
?>

<div class="table-responsive">
  <table class="table">
    <thead>
    	<tr>
    		<th>Najbolji vicevi</th>
    	</tr>
    </thead>
    <tbody>
    	<?php $newmodel=$model->all();
    	for ($i=0;$i<$model->count();$i++): ?>
    	<tr>
    		<?php foreach ($newmodel[$i] as $k=>$v):  ?>
    		<td><?php if($k=='title') echo $v ?></td>
    		<td><?php if($k=='joke') echo $v ?></td>
    		<?php endforeach; ?> 
    	</tr>
    	<?php endfor; ?>
    </tbody>
  </table>
</div>