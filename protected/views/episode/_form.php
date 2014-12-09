<?php
/* @var $this EpisodeController */
/* @var $model Episode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'episode-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NR_TOTAL'); ?>
		<?php echo $form->textField($model,'NR_TOTAL'); ?>
		<?php echo $form->error($model,'NR_TOTAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NR_STAFFEL'); ?>
		<?php echo $form->textField($model,'NR_STAFFEL'); ?>
		<?php echo $form->error($model,'NR_STAFFEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DEUTSCHER_TITEL'); ?>
		<?php echo $form->textField($model,'DEUTSCHER_TITEL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DEUTSCHER_TITEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ORIGINALTITEL'); ?>
		<?php echo $form->textField($model,'ORIGINALTITEL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ORIGINALTITEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ERSTAUSSTRAHLUNG_USA'); ?>
		<?php echo $form->textField($model,'ERSTAUSSTRAHLUNG_USA',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ERSTAUSSTRAHLUNG_USA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG'); ?>
		<?php echo $form->textField($model,'DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REGIE'); ?>
		<?php echo $form->textField($model,'REGIE',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'REGIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DREHBUCH'); ?>
		<?php echo $form->textField($model,'DREHBUCH',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DREHBUCH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'US_QUOTEN'); ?>
		<?php echo $form->textField($model,'US_QUOTEN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'US_QUOTEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'INHALT'); ?>
		<?php echo $form->textArea($model,'INHALT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'INHALT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->