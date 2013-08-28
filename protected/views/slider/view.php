<?php
$this->breadcrumbs=array(
	'Sliders'=>array('index'),
	$model->title,
);

<h1>View Slider #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'title',
		'html_content',
		'link',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
