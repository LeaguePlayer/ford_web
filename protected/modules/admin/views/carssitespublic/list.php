<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array("carssitespublic/create/id_category/{$id_category}")),
);
?>

<?php
    $str_js = "
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };
 
        
		function sortGrid()
		{
			$('#carssitespublic-grid table.items tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            items: 'tr',
            update : function () {
                serial = $('#carssitespublic-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'});
                $.ajax({
                    'url': '" . $this->createUrl('//admin/carssitespublic/sort') . "',
                    'type': 'post',
                    'data': serial,
                    'success': function(data){
                    },
                    'error': function(request, status, error){
                        alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
                    }
                });
            },
            helper: fixHelper
        	}).disableSelection();	
		}
		
		sortGrid();
    ";
 
    Yii::app()->clientScript->registerScript('sortable-project', $str_js);
?>

<h1><?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'carssitespublic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'rowCssClassExpression'=>'"status_{$data->status} items[]_{$data->id}"',
	'type'=>TbHtml::GRID_TYPE_HOVER,
	'columns'=>array(
	
		array(
			'name'=>'id_car',
			'type'=>'raw',
			'value'=>'Cars::getCars($data->id_car)',
			'filter'=>Cars::getCars()
		),
		
		array(
			'name'=>'id_complecations',
			'type'=>'raw',
			'value'=>'Carcomplecations::getForList($data->id_complecations)',
			'filter'=>Carcomplecations::getForList()
		),
		
		array(
			'name'=>'id_akpp',
			'type'=>'raw',
			'value'=>'Carakpp::getForList($data->id_akpp)',
			'filter'=>Carakpp::getForList()
		),
		
		array(
			'name'=>'id_body',
			'type'=>'raw',
			'value'=>'Carbody::getForList($data->id_body)',
			'filter'=>Carbody::getForList()
		),
		'price',
		
	
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Carssitespublic::getStatusAliases($data->status)',
			'filter'=>Carssitespublic::getStatusAliases()
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
			'template'=>'{update} {delete}',
		),
	),
)); ?>
