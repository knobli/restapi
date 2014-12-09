<?php
/* @var $this EpisodeController */
/* @var $model Episode */

$this->breadcrumbs=array(
	'Episodes'=>array('index'),
	$model->NR_TOTAL,
);

$this->menu=array(
	array('label'=>'List Episode', 'url'=>array('index')),
	array('label'=>'Create Episode', 'url'=>array('create')),
	array('label'=>'Update Episode', 'url'=>array('update', 'id'=>$model->NR_TOTAL)),
	array('label'=>'Delete Episode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NR_TOTAL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Episode', 'url'=>array('admin')),
);
?>

<h1>View Episode #<?php echo $model->NR_TOTAL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NR_TOTAL',
		'NR_STAFFEL',
		'DEUTSCHER_TITEL',
		'ORIGINALTITEL',
		'ERSTAUSSTRAHLUNG_USA',
		'DEUTSCHSPRACHIGE_ERSTAUSSTRAHLUNG',
		'REGIE',
		'DREHBUCH',
		'US_QUOTEN',
		'INHALT',
	),
)); ?>
