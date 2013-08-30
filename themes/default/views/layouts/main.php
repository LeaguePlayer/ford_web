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
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.pack.js?v=2.1.5', CClientScript::POS_END);

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
	
  
   <div id="shadow"></div>
    <div id="header">
      	<div class="fix_width">
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
					<h3><?=$this->about->title?></h3>
					<div class="about">
						<?=$this->about->html_content?>
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
						<a href="/site/feedback" class="callback_button fancybox">Связаться с нами</a>
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
					<a href="/cars" class="select">Выбери свой Ford</a>
					<a href="/ya_vladelec_ford" class="for_bysines">Для владельцев</a>
				</div>
			</div>

			<div class="right">
				<a class="green_button fancybox" href="/site/testdrive"><img src="<?php echo $this->getAssetsUrl() ?>/img/test_drive.png" alt=""><span>Записаться на тест-драйв</span></a>
				<a href="http://amobile-studio.ru" target="_blank" class="amobile">Всегда только лучшие идеи</a>
			</div>
		</div>
	

	

	
</body>
</html>