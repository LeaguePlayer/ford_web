<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->name,
);

<h1>View Orders #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_type',
		'car',
		'name',
		'phone',
		'email',
		'comment',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
