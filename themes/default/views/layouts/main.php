<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/selectbox/jquery.selectbox.css');
	$cs->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,600,700,800&subset=latin,cyrillic');
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/about.css');

	
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);

	$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_END);
	
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.color.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.selectbox-0.2.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/script.js', CClientScript::POS_END);
	
	
?><!DOCTYPE html>
<html lang="ru">
	<head>
    	<title><?php echo $this->title; ?></title>
		
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
       
        
	</head>
	<body>
	
 
  
   <div class="cont">
      <div id="header">
      <a href="/" class="fordlogo"><img src="<?php echo $this->getAssetsUrl() ?>/img/ford-logo.png" alt=""></a>
		<ul class="header_menu">
        
        	<?
            	if( count($this->top_buttons) > 0 )
				{
					foreach ( $this->top_buttons as $button )
					{
						echo "<li><a href='{$button[link]}'>{$button[text]}</a></li>";
					}
				}
			?>
				
		</ul>
		<div class="test">
			<a class="green_button fancybox" href="/site/testdrive"><img src="<?php echo $this->getAssetsUrl() ?>/img/test_drive.png" alt=""></a>
			<div class="hint">Записаться на тест-драйв</div>
		</div>
		<ul class="contacts">
			<li><span class="part">Отдел продаж: </span><span class="phone">(<?=$this->settings->phone_code_city?>) <strong><?=$this->settings->phone_sales?></strong></span></li>
			<li><span class="part">Сервис: </span><span class="phone">(<?=$this->settings->phone_code_city?>) <strong><?=$this->settings->phone_service?></strong></span></li>
		</ul>
		<a href="/" class="autogradlogo"><img src="<?php echo $this->getAssetsUrl() ?>/img/autograd-logo.png" alt=""></a>
      </div>
  </div>


	<?=$content;?>
	
    
    

		<section class="before_footer">
			<div class="content fix_width">
				<div class="col-1">
					<h3>Кто мы такие?</h3>
					<div class="about">
						<p>«Автоград» – это уникальный проект не только для Тюменского региона, но и для России в целом благодаря своему масштабу и замыслу.</p>

						<p>На центральной улице нашего города, на территории в 9 гектаров расположился каскад дилерских центров протяженностью в 1 км.</p>

						<p>Тогда же появилось желание «дублировать» уникальный проект в других городах. В 2008 году представительство компании открылось в </p>
						<div class="video_block">
							<div class="video">
								<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/video-1.jpg" alt="" class="poster">
								<a class="play" href="#"></a>
							</div>
							<div class="video">
								<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/video-2.jpg" alt="" class="poster">
								<a class="play" href="#"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-2">
                	<?=$this->renderPartial('/news/list_news_main',array('news'=>$this->bottom_list))?>
				</div>
				<div class="col-3">
					<h3>У Вас есть к нам вопросы?</h3>
					<div class="contacts">
						<a href="#feedback-box" class="callback_button fancybox">Связаться с нами</a>
						<div class="map">
							<div id="map_canvas"></div>
							<a href="#" class="open">+</a>
						</div>
						<div class="address"><?=$this->settings->street?></div>
						<ul class="phones">
							<li>Отдел продаж: (<?=$this->settings->phone_code_city?>) <?=$this->settings->phone_sales?></li>
							<li>Сервис: (<?=$this->settings->phone_code_city?>) <?=$this->settings->phone_service?></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

	</div>

	<div id="footer">
		<div class="cintent fix_width">
			<div class="ford_info">
				<a href="/" class="fordlogo"><img src="<?php echo $this->getAssetsUrl() ?>/img/ford-logo.png" alt=""></a>
				<p class="info">Автоград Гарант (2009-<?=date('Y')?>)</p>
			</div>

			<div class="middle">
				<div class="socials">
					<h3>Нравится Ford?</h3>
					<ul>
						<? if($this->settings->link_on_facebook) {?><li><a class="facebook" href="<?=$this->settings->link_on_facebook?>"></a></li><? }?>
						<? if($this->settings->link_on_vk) {?><li><a class="vkontakte" href="<?=$this->settings->link_on_vk?>"></a></li><? }?>
						<? if($this->settings->link_on_twitter) {?><li><a class="twitter" href="<?=$this->settings->link_on_twitter?>"></a></li><? }?>
					</ul>
				</div>
				<div class="menu">
					<a href="#" class="select">Выбери свой Ford</a>
					<a href="#" class="for_bysines">Для владельцев</a>
				</div>
			</div>

			<div class="right">
				<a class="green_button fancybox" href="/site/testdrive"><img src="<?php echo $this->getAssetsUrl() ?>/img/test_drive.png" alt=""><span>Записаться на тест-драйв</span></a>
				<a href="" class="amobile">Всегда только лучшие идеи</a>
			</div>
		</div>
	</div>

	

	

	<div id="insurance-box">
		<h3 id="ins-header">
			Страхование FORD
		</h3>
		<div id="ins-content">
			<p>FordСтрахование — специальная программа страхования для тех, кто собирается приобрести новый автомобиль или уже является владельцем автомобиля Ford. Эта программа разработана с целью обеспечения владельцев автомобилей Ford качественной страховой услугой по выгодным ценам. Программа распространяется на следущие модели Ford: Fiesta, Focus, Fusion, C-Max/Grand-C-Max, S-Max, Galaxy, Kuga, Mondeo, Ranger, Explorer.
			</p>
			<ul>
				<li>Привлекательные цены не только для новых, но и для подержанных автомобилей Ford</li>
				<li>Восстановительный ремонт на кузовной станции официального дилера Ford по технологии завода-изготовителя</li>
				<li>Использование оригинальных запчастей Ford</li>
			</ul>
			<p id="ins-after">
				Страховой полис по программе FordСтрахование может быть оформлен только непосредственно в дилерском центре официального дилера Ford.
			</p>
			<div class="ins-buttons">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/umb.png" alt="">
				<a href="#" class="green_button ins-release">Оформить страховку</a>
				<a href="#" class="ins-close">Закрыть</a>
			</div>
		</div>

	</div>

	
</body>
</html>