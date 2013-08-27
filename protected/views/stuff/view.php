<?php
$this->breadcrumbs=array(
	'Stuffs'=>array('index'),
	$model->title,
);

<h1>View Stuff #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'title',
		'short_desc',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
