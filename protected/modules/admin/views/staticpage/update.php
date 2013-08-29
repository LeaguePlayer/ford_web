<?php
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array("staticpage/list/system_page/{$model->system_page}")),
	array('label'=>'Добавить','url'=>array("staticpage/create/system_page/{$model->system_page}")),
);
?>

<h1><?php echo $model->translition(); ?> - Редактирование</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>