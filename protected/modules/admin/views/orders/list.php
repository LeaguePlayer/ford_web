

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
	 'rowCssClassExpression'=>'"status_{$data->status}"',
	'columns'=>array(
		
	
		
		
		array(
			'name'=>'id_type',
			'type'=>'raw',
			'value'=>'Orders::returnOrderTypes($data->id_type)',
			'filter'=>Orders::returnOrderTypes()
		),
		'car',
		'name',
		'phone',
		
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'"<a href=\'mailto:{$data->email}\'>{$data->email}</a>"',
		),
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Orders::getStatusAliases($data->status)',
			'filter'=>Orders::getStatusAliases()
		),
		
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', $data->create_time)'
		),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view} {delete}',
			'buttons'=>array
                    (
                       
						'view' => array
                        (
                            
							//'label'=>'<i class="icon-add-menu"></i>',
							'options'=>array('class'=>"fancybox"),
                            //'imageUrl'=>Yii::app()->request->baseUrl.'/media/images/cloud.png',
                            'url'=>'"/admin/orders/update/id/{$data->id}"',
                        ),
                        
                    ),
		),
	),
)); ?>
