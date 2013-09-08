<div id="content">

       <div id="ajax_place">
			<? if( !isset($data['car_menu']) ) { ?>
                <?=$this->renderPartial('/cars/_cars',array('cars'=>$data['avail_cars']))?>
            <? } ?>
        
        </div>
        <div id="ajax_view">
        
			<? if(isset($data['car_menu'])) { ?>
            
                 <?=$this->renderPartial('/cars/_about_car',array('data'=>$data))?>
            <? } ?>
        </div>
        
        <section class="promises fix_width">
            <h3>Автоград гарантирует</h3>
            <div class="promise-1">
                <a class="fancybox" href="/strahovanie"></a>
                <p class="pheader">Страхование автомобилей</p>
                <p class="p-desc">
                FordСтрахование — специальная программа страхования для тех, кто собирается приобрести новый автомобиль или уже</p>
            </div>
            <div class="promise-2">
                <a class="fancybox" href="/servisnoe-i-garantiynoe-obsluzhivanie"></a>
                <p class="pheader">Техническое обслуживание</p>
                <p class="p-desc">
                    Все специалисты компании проходят обязательное обучение, сертификацию и стажировку в учебных центрах компаний-производителей.
                </p>
            </div>
            <div class="promise-3">
                <a class="fancybox" href="/kreditovanie"></a>
                <p class="pheader">Кредитование от <b>FORD</b></p>
                <p class="p-desc">Наша компания (ООО "Эскорт-Финанс") предлагает Вам приобрести в кредит новые автомобили представленных в Автограде</p>
            </div>
        </section>
        
        <!--END-content-->
        
        <section class="site_map four">
            <?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
        </section>
</div>