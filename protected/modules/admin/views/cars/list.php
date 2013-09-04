<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cars-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
	 'rowCssClassExpression'=>'"status_{$data->status}"',
	'columns'=>array(
		'title',
		array(
			'header'=>'Фото',
			'type'=>'raw',
			'value'=>'TbHtml::imageRounded($data->getThumb("small"))'
		),
		'price',
		
		
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Cars::getStatusAliases($data->status)',
			'filter'=>array(Cars::getStatusAliases())
		),
		
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', $data->create_time)'
		),
		array(
			'name'=>'update_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->update_time).\' в \'.date(\'H:i\', $data->update_time)'
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{add} {view} {update} {delete}',
			'buttons'=>array
                    (
                       'add' => array
                        (
                            
							'label'=>'<i class="icon-add-menu"></i>',
							'options'=>array('title'=>"Добавить этот автомобиль в слайдер"),
                            //'imageUrl'=>Yii::app()->request->baseUrl.'/media/images/cloud.png',
                            'url'=>'Yii::app()->createUrl("/admin/slider/create", array("car"=>$data->id))',
                        ),
						'view' => array
                        (
                            
							//'label'=>'<i class="icon-add-menu"></i>',
							'options'=>array('target'=>"_blank"),
                            //'imageUrl'=>Yii::app()->request->baseUrl.'/media/images/cloud.png',
                            'url'=>'"/cars/{$data->id}"',
                        ),
                        
                    ),
		),
	),
)); ?>
