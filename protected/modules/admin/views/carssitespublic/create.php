<?php
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список','url'=>array("carssitespublic/list/id_category/{$id_category}")),
);
?>

<h1><?php echo $model->translition(); ?> - Добавление</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data'=>$data)); ?>