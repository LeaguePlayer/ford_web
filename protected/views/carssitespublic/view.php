<?php
$this->breadcrumbs=array(
	'Carssitespublics'=>array('index'),
	$model->id,
);

<h1>View Carssitespublic #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_car',
		'id_site',
		'id_category',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
