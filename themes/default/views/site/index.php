<div id="content">
		
        <? if( ( count($data['stock']) + count($data['stock']) ) > 0) {?>
            <section class="specials fix_width">
                <h2 class="caption">Спецпредложения</h2><a href="/stock" class="all_spec">все предложения</a>
                <div class="left">
                    <?=$this->renderPartial('/news/list_stock',array('stocks'=>$data['stock']))?>
                </div>
                <div class="right">
                    <?=$this->renderPartial('/news/list_super_stock',array('stock'=>$data['super_stock']))?>
                </div>
            </section>
         <? }?>
		
		<section class="slider">
			<div class="viewport">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/slide-1.jpg" alt="" data-id="1" style="position: absolute; top: 0; left: 0;">
			</div>

			<div class="images" style="display: none">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/slide-1.jpg" alt="" data-id="1">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/slider-2.jpg" alt="" data-id="2">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/slider-3.jpg" alt="" data-id="3">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/slider-4.jpg" alt="" data-id="4">
				<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/slide-5.jpg" alt="" data-id="5">
			</div>

			<div class="thumbs_wrap fix_width">
				<ul class="thumbs">
					<li class="thumb">
						<a href="1">
							<span class="title">fORD MUSTANG</span>
							<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/thumb-1.jpg" alt="">
						</a>
					</li>
					<li class="thumb">
						<a href="2">
							<span class="title">fORD ranger new</span>
							<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/thumb-2.jpg" alt="">
						</a>
					</li>
					<li class="thumb">
						<a href="3">
							<span class="title">fORD kuga new</span>
							<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/thumb-3.jpg" alt="">
						</a>
					</li>
					<li class="thumb">
						<a href="4">
							<span class="title">fORD<br> focus</span>
							<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/thumb-4.jpg" alt="">
						</a>
					</li>
					<li class="thumb">
						<a href="5">
							<span class="title">fORD<br> transit</span>
							<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/thumb-5.jpg" alt="">
						</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</section>


		<section class="gide">
			<div class="content fix_width">
				<h2>Гид покупателя</h2>
				<div class="round">
					<div class="step auto"><a href="/cars" class="">Выбор автомобиля</a></div>
					<div class="step finance"><a href="/finansovye-uslugi" class="">Финансовые услуги</a></div>
					<span class="hint">(кредит, лизинг)</span>
					<div class="step strach"><a href="/strahovanie" class="fancybox">Страхование</a></div>
					<div class="step contract"><a href="/programma-fordserviskontrakt" class="">FORD Сервис Контракт</a></div>
					<div class="step help"><a href="/ford-pomosch-na-dorogah" class="">FORD помощь на дорогах</a></div>
					<div class="step gibdd"><a href="/postavnovka-na-uchet-v-gibdd" class="">Постановка на учет в ГИБДД</a></div>
					<div class="step service"><a href="/servisnoe-i-garantiynoe-obsluzhivanie1" class="">Сервисное и гарантийное обслуживание</a></div>
					<div class="step original"><a href="/original-nye-zapasnye-chasti-ford" class="">Оригинальные запчасти</a></div>
					<div class="step treid"><a href="/trade-in" class="">Трейд-ин</a></div>
				</div>
			</div>
		</section>


		<section class="site_map">
				<?=$this->renderPartial('/menu/list_on_main',array('menu'=>$data['menu']))?>
		</section>
