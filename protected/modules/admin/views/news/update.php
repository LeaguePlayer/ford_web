<?php
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('list','id_type'=>$id_type)),
	array('label'=>'Добавить','url'=>array('create','id_type'=>$id_type)),
);
?>

<h1><?php echo $model->translition(); ?> - Редактирование</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>