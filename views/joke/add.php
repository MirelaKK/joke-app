<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Dodaj vic';
?>



<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($joke, 'title',[
    'template' => '{label} <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'
])->label('Naziv vica'); ?>

<?= $form->field($joke, 'text',[
    'template' => '{label} <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'
])->label('Text vica'); ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
