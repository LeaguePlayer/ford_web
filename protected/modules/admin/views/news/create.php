<?php
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список','url'=>array('list','id_type'=>$id_type)),
);
?>

<h1><?php echo $model->translition(); ?> - Добавление</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data'=>$data)); ?>