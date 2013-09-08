<?php


$this->menu=array(
	array('label'=>'Список','url'=>array("/admin/complectationvalues/list/id_complectation/{$id_complectation}")),
);
?>

<h1><?php echo $model->translition(); ?> - Добавление</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>