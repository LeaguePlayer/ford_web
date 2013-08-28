<div id="content">

<section class="welcome fix_width">
			<h1>Добро пожаловать в автоград</h1>
			<div class="paragraph">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/about-1.jpg" class="float_left">
				<p>Ещё в 2005 году на месте крупнейшего тюменского автомобильного холдинга по ул. Республики было лишь чистое поле. Год за годом один за другим появлялись дилерские центры и со временем образовали целый «автомобильный город». Тогда «Автоград» сформировался не просто как место, где расположилась 1 000 единиц техники, а как целая философия. Философия, основанная на трех ключевых принципах: свобода выбора, высокое качество и комфорт. Все эти  три составляющих объединились под брендом «Автоград».</p>
				<p>Тогда же появилось желание «дублировать» уникальный проект в других городах. В 2008 году представительство компании открылось в Сургуте. Сегодня продолжается возведение дилерских центров и в других сибирских городах.</p>
				<p>В Тюмени только площадь помещений «Автограда» составляет более 35 000 кв.м, и включает в себя 9 автосалонов, 2 цеха кузовного ремонта и площадку для автомобилей с пробегом.</p>
				<p>В 2012 году открыт новый фирменный автосалон в Тюмени по улице Горпищекомбинатовская 21а.</p>
			</div>
			<div class="paragraph">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/about-2.jpg" class="float_right">
				<p class="title">«Автоград» – это  удобство для автомобилиста. </p>
				<p>Ещё в 2005 году на месте крупнейшего тюменского автомобильного холдинга по ул. Республики было лишь чистое поле. Год за годом один за другим появлялись дилерские центры и со временем образовали целый «автомобильный город».</p>
				<p>Тогда «Автоград» сформировался не просто как место, где расположилась 1 000 единиц техники, а как целая философия.</p>
			</div>

			<div class="paragraph about webcam">
				<h2>ВЕБ-КАМЕРА В САЛОНЕ</h2>
				<div class="viewcam">
					<span class="courner-lt"></span>
					<span class="courner-lb"></span>
					<span class="courner-rt"></span>
					<span class="courner-rb"></span>
					<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/by_view.jpg" alt="">
					<a href="#" class="orange_button">к просмотру</a>
				</div>
				<p>Ещё в 2005 году на месте крупнейшего тюменского автомобильного холдинга по ул. Республики было лишь чистое поле. Год за годом один за другим появлялись дилерские центры и со временем образовали целый «автомобильный город».</p>
				<p>Тогда «Автоград» сформировался не просто как место, где расположилась 1 000 единиц техники, а как целая философия. Философия, основанная на трех ключевых принципах: свобода выбора</p>
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
        