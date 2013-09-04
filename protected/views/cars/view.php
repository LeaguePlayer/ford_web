<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	$model->title,
);

<h1>View Cars #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'image',
		'price',
		'video1',
		'video2',
		'video3',
		'gallery',
		'meta_title',
		'meta_keys',
		'meta_desc',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
