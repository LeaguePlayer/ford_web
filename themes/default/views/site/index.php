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
		
        <? if( count($data['slider']) > 0 ) { ?>
       
            <section class="slider">
                
    
                <?=$this->renderPartial('/slider/_slide',array('slider'=>$data['slider']))?>
           
          

			
		</section>

 		<? } ?>
        
        
        
		<section class="gide">
			<div class="content fix_width">
				<h2>Гид покупателя</h2>
				<div class="round">
					<div class="step auto"><a href="/avtomobili" class="">Выбор автомобиля</a></div>
					<div class="step finance"><a href="/finansovye-uslugi" class="">Финансовые услуги</a></div>
					<span class="hint">(кредит, лизинг)</span>
					<div class="step strach"><a href="/strahovanie" class="fancybox">Страхование</a></div>
					<div class="step contract"><a href="/programma-fordserviskontrakt" class="">FORD Сервис Контракт</a></div>
					<div class="step help"><a href="/ford-pomosch-na-dorogah" class="">FORD помощь на дорогах</a></div>
					<div class="step gibdd"><a href="/postavnovka-na-uchet-v-gibdd" class="">Постановка на учет в ГИБДД</a></div>
					<div class="step service"><a href="/servisnoe-i-garantiynoe-obsluzhivanie" class="">Сервисное и гарантийное обслуживание</a></div>
					<div class="step original"><a href="/original-nye-zapasnye-chasti-ford" class="">Оригинальные запчасти</a></div>
					<div class="step treid"><a href="/trade-in" class="">Трейд-ин</a></div>
				</div>
			</div>
		</section>


		<section class="site_map">
				<?=$this->renderPartial('/menu/list_on_main',array('menu'=>$data['menu']))?>
		</section>
