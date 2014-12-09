<?php
/* @var $this EpisodeController */
/* @var $model Episode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NR_TOTAL'); ?>
		<?php echo $form->textField($model,'NR_TOTAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NR_STAFFEL'); ?>
		<?php echo $form->textField($model,'NR_STAFFEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DEUTSCHER_TITEL'); ?>
		<?php echo $form->textField($model,'DEUTSCHER_TITEL',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ORIGINALTITEL'); ?>
		<?php echo $form->textField($model,'ORIGINALTITEL',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ERSTAUSSTRAHLUNG_USA'); ?>
		<?php echo $form->textField($model,'ERSTAUSSTRAHLUNG_USA',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG'); ?>
		<?php echo $form->textField($model,'DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REGIE'); ?>
		<?php echo $form->textField($model,'REGIE',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DREHBUCH'); ?>
		<?php echo $form->textField($model,'DREHBUCH',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'US_QUOTEN'); ?>
		<?php echo $form->textField($model,'US_QUOTEN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'INHALT'); ?>
		<?php echo $form->textArea($model,'INHALT',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->