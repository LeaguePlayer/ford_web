<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <title><?php echo CHtml::encode(Yii::app()->name).' | Admin';?></title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	  
		<?php
			/*
			$menuItems = array();
			foreach (SiteHelper::scanNameModels() as $modelClass) {
				$controllerId = strtolower($modelClass);
				$menuItems[] = array('label'=>$modelClass, 'url'=>'#', 'items' => array(
					array('label'=>'Создать', 'url'=>"/admin/{$controllerId}/create"),
					array('label'=>'Список', 'url'=>"/admin/{$controllerId}/list"),
				));
			}
			 */
			 
			$menuItems = array(
				//array('label'=>'Настройки', 'url'=>'/admin'),
				array('label'=>'Настройки сайта', 'url'=>$this->url_settings),
				array('label'=>'Пользователи', 'url'=>"/admin/users/list/"),
				array('label'=>'Заявки', 'url'=>"/admin/orders/list/"),
				array('label'=>'Системные страницы', 'url'=>"/admin/staticpage/list/system_page/1"),
				array('label'=>'Разделы', 'url'=>'#', 'items' => array(
					
					array('label'=>'Меню', 'url'=>'/admin/menu/list', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/menu/create"),
						array('label'=>'Список', 'url'=>"/admin/menu/list"),
					)),
					array('label'=>'Страницы', 'url'=>'/admin/staticpage/list', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/staticpage/create"),
						array('label'=>'Список', 'url'=>"/admin/staticpage/list/system_page/0"),
					)),
					array('label'=>'Новости', 'url'=>'/admin/news', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/news/create"),
						array('label'=>'Список', 'url'=>"/admin/news"),
					)),
					
					array('label'=>'Акции', 'url'=>'/admin/stock', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/stock/create"),
						array('label'=>'Список', 'url'=>"/admin/stock"),
					)),
					
					array('label'=>'Слайдер', 'url'=>'/admin/slider/list', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/slider/create"),
						array('label'=>'Список', 'url'=>"/admin/slider/list"),
					)),
					
					array('label'=>'Сотрудники', 'url'=>'/admin/stuff/list', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/stuff/create"),
						array('label'=>'Список', 'url'=>"/admin/stuff/list"),
					)),
				)),
			);
            
            /*
            $menuItems = array(
				array('label'=>'Настройки', 'url'=>'/admin'),
				array('label'=>'Разделы', 'url'=>'#', 'items' => array(
					array('label'=>'Сотрудники', 'url'=>"/admin/employees/list"),
				)),
			);
            */
		?>
        
        <?
			$domains = Yii::app()->user->avail_sites;
			foreach ($domains as $key => $domain)
			{
				$menuDomains[] = array('label'=>fnc::returnDomains($domain), 'url'=>"/admin/settingsite/switchsite/to/{$key}");
			}
			
		?>
        
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			'color'=>'inverse', // null or 'inverse'
			'brandLabel'=> CHtml::encode(Yii::app()->name),
			'brandUrl'=>'/',
			'fluid' => true,
			'collapse'=>true, // requires bootstrap-responsive.css
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>$menuItems,
				),
				
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
						array('label'=>"Выйти ($this->username)", 'url'=>'/admin/user/logout'),
					),
				),
				
				
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
						array('label'=>"$this->currentSite", 'url'=>'#', 'items' => $menuDomains),
					),
				),
			),
		)); ?>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span1">
				<?php $this->widget('bootstrap.widgets.TbMenu', array(
					'type'=>'list',
					'items'=> $this->menu
					)); ?>
				</div>
				<div class="span11">
					<?php echo $content;?>
				</div>
			</div>
		</div>

	</body>
</html>
