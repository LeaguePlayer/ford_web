

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
	'columns'=>array(
		
		array(
			'name'=>'id_site',
			'type'=>'raw',
			'value'=>'fnc::returnDomains($data->id_site)',
			'filter'=>fnc::returnDomains()
		),
		
		
		array(
			'name'=>'id_type',
			'type'=>'raw',
			'value'=>'Orders::returnOrderTypes($data->id_type)',
			'filter'=>Orders::returnOrderTypes()
		),
		'car',
		'name',
		'phone',
		'email',
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
							//'options'=>array('target'=>"_blank"),
                            //'imageUrl'=>Yii::app()->request->baseUrl.'/media/images/cloud.png',
                            'url'=>'"/admin/orders/update/id/{$data->id}"',
                        ),
                        
                    ),
		),
	),
)); ?>
