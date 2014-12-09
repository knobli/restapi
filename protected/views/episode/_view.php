<?php
/* @var $this EpisodeController */
/* @var $data Episode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NR_TOTAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NR_TOTAL), array('view', 'id'=>$data->NR_TOTAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NR_STAFFEL')); ?>:</b>
	<?php echo CHtml::encode($data->NR_STAFFEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEUTSCHER_TITEL')); ?>:</b>
	<?php echo CHtml::encode($data->DEUTSCHER_TITEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ORIGINALTITEL')); ?>:</b>
	<?php echo CHtml::encode($data->ORIGINALTITEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ERSTAUSSTRAHLUNG_USA')); ?>:</b>
	<?php echo CHtml::encode($data->ERSTAUSSTRAHLUNG_USA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG')); ?>:</b>
	<?php echo CHtml::encode($data->DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REGIE')); ?>:</b>
	<?php echo CHtml::encode($data->REGIE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DREHBUCH')); ?>:</b>
	<?php echo CHtml::encode($data->DREHBUCH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('US_QUOTEN')); ?>:</b>
	<?php echo CHtml::encode($data->US_QUOTEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INHALT')); ?>:</b>
	<?php echo CHtml::encode($data->INHALT); ?>
	<br />

	*/ ?>

</div>