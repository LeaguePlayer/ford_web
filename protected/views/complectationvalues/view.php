<?php
$this->breadcrumbs=array(
	'Complectationvalues'=>array('index'),
	$model->id,
);

<h1>View Complectationvalues #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_complectation',
		'id_category_public',
		'param',
		'value',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
