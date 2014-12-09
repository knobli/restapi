<?php
/* @var $this EpisodeController */
/* @var $model Episode */

$this->breadcrumbs=array(
	'Episodes'=>array('index'),
	$model->NR_TOTAL=>array('view','id'=>$model->NR_TOTAL),
	'Update',
);

$this->menu=array(
	array('label'=>'List Episode', 'url'=>array('index')),
	array('label'=>'Create Episode', 'url'=>array('create')),
	array('label'=>'View Episode', 'url'=>array('view', 'id'=>$model->NR_TOTAL)),
	array('label'=>'Manage Episode', 'url'=>array('admin')),
);
?>

<h1>Update Episode <?php echo $model->NR_TOTAL; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>