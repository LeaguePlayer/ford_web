<?php
/* @var $this PartnersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Partners',
);

$this->menu=array(
	array('label'=>'Create Partners', 'url'=>array('create')),
	array('label'=>'Manage Partners', 'url'=>array('admin')),
);
?>

<h1>Partners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
