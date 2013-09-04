<?php
/* @var $this CarssitespublicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carssitespublics',
);

$this->menu=array(
	array('label'=>'Create Carssitespublic', 'url'=>array('create')),
	array('label'=>'Manage Carssitespublic', 'url'=>array('admin')),
);
?>

<h1>Carssitespublics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
