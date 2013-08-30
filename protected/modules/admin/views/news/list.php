<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array("create",'id_type'=>$id_type)),
);
?>

<?php Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotels-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
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
			$('#news-grid table.items tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            items: 'tr',
            update : function () {
                serial = $('#news-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'});
                $.ajax({
                    'url': '" . $this->createUrl('//admin/news/sort') . "',
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


<h1>Управление <?php echo $model->translition(); ?></h1>

<? if($id_type==1) { ?>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'news-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'afterAjaxUpdate'=>'sortGrid',
			 'rowCssClassExpression'=>'"items[]_{$data->id} status_{$data->status}"',
			 
			'type'=>TbHtml::GRID_TYPE_HOVER,
			'columns'=>array(
				
				'title',
				
				array(
					'header'=>'Фото',
					'type'=>'raw',
					'value'=>'TbHtml::imageRounded($data->getThumb("small"))'
				),
				
				array(
					'name'=>'super_show',
					'type'=>'raw',
					'value'=>'fnc::returnYesNo($data->super_show)',
					'filter'=>fnc::returnYesNo()
				),
				array(
					'name'=>'status',
					'type'=>'raw',
					'value'=>'News::getStatusAliases($data->status)',
					'filter'=>News::getStatusAliases()
				),
				
				array(
					'name'=>'super_work_to',
					'type'=>'raw',
					'value'=>'SiteHelper::russianDate($data->super_work_to).\' в \'.date(\'H:i\', $data->super_work_to)'
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
				),
			),
		)); ?>
        
<? } else { ?>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'news-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'afterAjaxUpdate'=>'sortGrid',
			 'rowCssClassExpression'=>'"items[]_{$data->id}"',
			'type'=>TbHtml::GRID_TYPE_HOVER,
			'columns'=>array(
				
				'title',
				
				array(
					'header'=>'Фото',
					'type'=>'raw',
					'value'=>'TbHtml::imageRounded($data->getThumb("small"))'
				),
				
				
				array(
					'name'=>'status',
					'type'=>'raw',
					'value'=>'News::getStatusAliases($data->status)',
					'filter'=>News::getStatusAliases()
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
					'template'=>'{view} {update} {delete}',
                    'buttons'=>array
                    (
                        'view' => array
                        (
                            'url'=>'Yii::app()->createUrl("/news/{$data->id}")',
                        ),
						
                        
                    ),
				),
			),
		)); ?>

<? } ?>
