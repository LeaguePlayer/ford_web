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
            <div id="for_center" style="height:1px;"></div>
		</div>
		<section class="map">
			<div id="map_baloon">
			 	<img src="<?php echo $this->getAssetsUrl() ?>/img/ford-logo.png" style="display: inline-block; vertical-align: middle;">
			 	<b><p style="display: inline-block; vertical-align: middle;"><?=$this->settings->street?></p></b>
			 </div>
			<div id="map"></div>
            
            <script type="text/javascript">
            	$(document).ready(function(e) {
						ymaps.ready(function () {
						var myMap;
						// Создание экземпляра карты и его привязка к созданному контейнеру.
						ymaps.geocode('<?=$this->settings->street?>', {
							results: 1
						}).then(function (res) {
							var firstGeoObject = res.geoObjects.get(0);
							myMap = new ymaps.Map("map", {
								center: firstGeoObject.geometry.getCoordinates(),
								zoom: 16,
								behaviors: ['drag']
							});
							
							var baloon = $("#map_baloon").html();
							
							// Создание метки
							var myPlacemark = window.myPlacemark = new ymaps.Placemark(myMap.getCenter(), {balloonContent: baloon}, {
								iconImageHref: '<?php echo $this->getAssetsUrl() ?>/img/marker_big.png',
								});
				
								// Не скрываем иконку при открытом балуне.
								// hideIconOnBalloonOpen: false,
								// И дополнительно смещаем балун, для открытия над иконкой.
								// balloonOffset: [3, -30]
				
							myMap.geoObjects.add(myPlacemark);
							myMap.controls.add('zoomControl');
						});
					});
                });
            </script>

			<p class="address"><?=$this->settings->street?></p>
			<p class="phones">Отдел продаж: (<?=$this->settings->phone_code_city?>) <?=$this->settings->phone_sales?> </p>
			<p class="phones">Сервисный центр: (<?=$this->settings->phone_code_city?>) <?=$this->settings->phone_service?> </p>
		</section>


		<? if(count($data['partners']) > 0) { ?>
            <section class="partners fix_width">
                <h3 class="header">
                    Наши партнеры
                </h3>
                    <? foreach($data['partners'] as $partner) { ?>
                    	<? $link = ( empty($partner->link) ? "javascript:void(0);" : $partner->link ); ?>
                        <a href="<?=$link?>" class="partner"><img src="<?=$partner->getThumb('medium')?>" alt=""></a>
                    <? } ?>
            </section>
		<? } ?>
		
		<section class="site_map four">
			<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
		</section>

		<section class="recommended">
			<div class="brace">
				<p class="header">Рекомендуем</p>
				<img src="<?php echo $this->getAssetsUrl() ?>\img\brace.png" alt="">
			</div>
				
			<div class="block first">
				<a href="/stock" class="block_head">Узнать о наших акциях</a>
				<p class="block_text">Мы постоянно проводим различные акции и спецпредложения</p>
			</div>
			<div class="block second">
				<a href="/avtomobili" class="block_head">Выбрать модель FORD</a>
				<p class="block_text">Выберите модель Ford по своему вкусу</p>
			</div>
			<div class="block third">
				<a href="/trade-in" class="block_head">Программа TradeIn</a>
			</div>
		</section>
 </div>