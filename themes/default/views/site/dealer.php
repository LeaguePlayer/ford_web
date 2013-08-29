<div id="content">

<section class="welcome fix_width">
			<h1><?=$data['page']->title?></h1>
			
            <?=$data['page']->html_content?>

			<div class="paragraph about webcam">
				<h2><?=$data['camera']->title?></h2>
				<div class="viewcam">
					<span class="courner-lt"></span>
					<span class="courner-lb"></span>
					<span class="courner-rt"></span>
					<span class="courner-rb"></span>
					<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/by_view.jpg" alt="">
					<a href="#" class="orange_button">к просмотру</a>
				</div>
				<?=$data['camera']->html_content?>
			</div>
			
            
            <?=$this->renderPartial('/stuff/list',array('stuff'=>$data['stuff']))?>
			
				
		</section>


		<div class="paragraph about map fix_width">
			<h2>МЫ ВСЕГДА РЯДОМ С НАШИМИ КЛИЕНТАМИ</h2>
		</div>
		<section class="map">
			<div id="map">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/map-2.jpg" alt="" style="width: 1400px; height: 470px;">
			</div>

			<p class="address"><?=$this->settings->street?></p>
			<p class="phones">Отдел продаж: (<?=$this->settings->phone_code_city?>) <?=$this->settings->phone_sales?> </p>
			<p class="phones">Сервисный центр: (<?=$this->settings->phone_code_city?>) <?=$this->settings->phone_service?> </p>
		</section>

		<section class="partners fix_width">
			<h3 class="header">
				Наши партнеры
			</h3>
			<a href="#" class="partner nissan"></a>
			<a href="#" class="partner toyota"></a>
		</section>

		
		<section class="site_map four">
			<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
		</section>

		<section class="recommended">
			<div class="brace">
				<p class="header">Рекомендуем</p>
				<img src="<?php echo $this->getAssetsUrl() ?>\img\brace.png" alt="">
			</div>
				
			<div class="block first">
				<a href="#" class="block_head">Узнать о наших акциях</a>
				<p href="#" class="block_text">Мы постоянно проводим различные акции и спецпредложения</p>
			</div>
			<div class="block second">
				<a href="#" class="block_head">Выбрать модель FORD</a>
				<p href="#" class="block_text">Выберите модель Ford по своему вкусу</p>
			</div>
			<div class="block third">
				<a href="#" class="block_head">Программа TradeIn</a>
			</div>
		</section>
        