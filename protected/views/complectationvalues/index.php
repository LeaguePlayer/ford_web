<?php
/* @var $this ComplectationvaluesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Complectationvalues',
);

$this->menu=array(
	array('label'=>'Create Complectationvalues', 'url'=>array('create')),
	array('label'=>'Manage Complectationvalues', 'url'=>array('admin')),
);
?>

<h1>Complectationvalues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
