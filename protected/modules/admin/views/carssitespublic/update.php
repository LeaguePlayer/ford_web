<?php
/*
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array("carssitespublic/list/id_category/{$model->id_category}")),
	array('label'=>'Добавить','url'=>array("carssitespublic/create/id_category/{$model->id_category}")),
);
*/

?>


<h1><?php echo $model->translition(); ?> - Редактирование</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'data'=>$data)); ?>