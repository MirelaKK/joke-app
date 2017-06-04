
<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;


$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php Html::beginForm(['id' => 'contact-form']); ?>

                    <?= Html::textinput('Name'); ?>

                    <?= Html::textinput('Email'); ?>

                    <?= Html::textinput('Massage'); ?>

                    <div class="form-group">
			        <?= Html::submitButton('Submit', ['class' => 'submit']); ?>
			    	</div>
			    	<?= Html::endForm(); ?>

            </div>
        </div>

   
</div>

?>