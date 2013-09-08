
<? if( isset($options[1]) ) { ?>
				    <div class="parameter track">
                        <p>Расход в городе</p>
                        <p class="track_val"><?=$options[1]?></p>
                    </div>
<? } ?>
                    
                    <? if( isset($options[2]) ) { ?>
                        <div class="parameter city">
                            <p>Расход на трассе</p>
                            <p class="city_val"><?=$options[2]?></p>
                        </div>
                    <? } ?>
                    
                    <? if( isset($options[3]) ) { ?>
                        <div class="parameter accel">
                            <p>Разгон 0-100 Км/ч</p>
                            <p class="accel_val"><?=$options[3]?></p>
                        </div>
                    <? } ?>
                    
                    <? if( isset($options[4]) ) { ?>
                        <div class="parameter out">
                            <p>Выбросы CO2</p>
                            <p class="out_val"><?=$options[4]?></p>
                        </div>
                    <? } ?>
                    
                    <? if( isset($options[5]) ) { ?>
                        <div class="parameter doors">
                            <p>Число дверей</p>
                            <p class="doors_val"><?=$options[5]?></p>
                        </div>
                    <? } ?>
                    
                    <? if( isset($options[6]) ) { ?>
                        <div class="parameter places">
                            <p>Количество мест</p>
                            <p class="places_val"><?=$options[6]?></p>
                        </div>
                    <? } ?>