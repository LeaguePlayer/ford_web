

<a class="a_option" href="/admin/complectationvalues/create/id_complectation/<?=$id_complectation?>">ДОБАВИТЬ ОПЦИЮ</a>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'complectationvalues-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
	'columns'=>array(
		
		
		'param',
		'value',
		
		array(
			'name'=>'property',
			'type'=>'raw',
			'value'=>'Complectationvalues::getValues($data->property)',
			'filter'=>Complectationvalues::getValues()
		),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
		),
	),
)); ?>
