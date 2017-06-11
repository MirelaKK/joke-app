<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Najbolji vicevi';
?>

   
    <?php $newmodel=$model->all();
        for ($i=0;$i<$model->count();$i++): ?>
                    
            <h2><?= Html::a($newmodel[$i]['title'], ['site/joke', 'id' => $newmodel[$i]['id']], ['class' => 'profile-link']) ?></h2>
            <p><?php echo $newmodel[$i]['joke']; ?></p>             
            
        <?php endfor; ?>
         
        

