 <? if( count($cars) > 0 ) { ?>
     <section class="car-list fix_width">
                <h2 class="list_header">Выбери свой FORD!</h2>
                
                <? foreach ( $cars as $car ) { ?>
                    <div class="car">
                        <a href="/cars/view/id_car/<?=$car->id_car?><?=($avail_now ? "/avail_now/yes" : "")?>"></a>
                        <div class="background">
                        	<div style="background-image:url('<?=$car->car->getThumb('medium')?>')"></div>
                            
                        </div>
                        <p class="car-name"><?=str_replace("Ford ", "", $car->car->title)?></p>
                        <p class="car-price"> От <?=fnc::priceFormat($car->price)?> Руб.</p>
                    </div>
                <? } ?>
    </section>
<? } ?>