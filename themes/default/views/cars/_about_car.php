<section class="car-selected fix_width">
            <div class="current-car"><h3 class="car-header"><?=$data['car_menu']->title?></h3><a href="<?=$data['return_link']?>" class="orange_button choose">Выбрать другую модель</a></div>
            <div class="videos">
            
            <? if( $data['car_menu']->video1 ) { ?>
            	<div class="video_div">
					<?
                        $url = ( !empty($data['car_menu']->image_video1)  ? $data['car_menu']->promo1->getThumb('small') : "{$this->getAssetsUrl()}/img/tmp/ford_video1.jpg" );
                        $image = "<img src='{$url}' alt=''>";
                    ?>
                    <a href="/site/video/car/<?=$data['car_menu']->id?>/position/1" class="fancybox"></a>
                    <?=$image?>
                </div>
            <? } ?>
                
                
             <? if( $data['car_menu']->video2 ) { ?>
                     <div class="video_div">
                        <?
                            $url = ( !empty($data['car_menu']->image_video2)  ? $data['car_menu']->promo2->getThumb('small') : "{$this->getAssetsUrl()}/img/tmp/ford_video2.jpg" );
                            $image = "<img src='{$url}' alt=''>";
                        ?>
                        <a href="/site/video/car/<?=$data['car_menu']->id?>/position/2" class="fancybox"></a>
                        <?=$image?>
                     </div>
                <? } ?>
                
              <? if( $data['car_menu']->video3 ) { ?>
                   <div class="video_div">
						<?
                            $url = ( !empty($data['car_menu']->image_video3)  ? $data['car_menu']->promo3->getThumb('small') : "{$this->getAssetsUrl()}/img/tmp/ford_video3.jpg" );
                            $image = "<img src='{$url}' alt=''>";
                        ?>
                        <a href="/site/video/car/<?=$data['car_menu']->id?>/position/3" class="fancybox"></a>
                        <?=$image?>
                    </div>
                <? } ?>
            </div>
            <a href="#" class="see">Посмотреть салон</a>
            <img src="<?=$data['car_menu']->big_image_im->getThumb('medium')?>" alt="">
        </section>
        
        
        <section class="parameters fix_width">
         
            <div class="gallery">
            <? if( count($data['car_menu']->galleryManager->getGallery()->galleryPhotos) > 0 ) { ?>
                <h2>Фотогалерея</h2>
               
               <? foreach( $data['car_menu']->galleryManager->getGallery()->galleryPhotos as $photo ) { ?>
               
               		<a href="<?=$photo->getUrl('medium')?>" class="fancybox_image" rel="image">
                	<img tid="1" class="gThumb" src="<?=$photo->getUrl('small')?>" class="thumb"></a>
                    
               <? } ?>
                
               
                
                <? } ?>
                
                <? if( $data['car_menu']->link ) { ?>
                	<div class="more">
                        <h2>Хотите узнать больше о <?=$data['car_menu']->title?>?</h2>
                        <p>Посетите <a href="<?=$data['car_menu']->link?>" target="_blank">официальный сайт Ford</a></p>
                    </div>
                <? } ?>
                
                
            </div>
            
            
            
            <div class="review">
            	<? if( count($data['options']) > 0 ) { ?>
                    <h2>Краткий обзор</h2>
                    <div class="rev">
                        <? echo $this->renderPartial('/cars/_light_look', array( 'options'=>$data['options'] ) ); ?>
                    </div>
                <? } ?>
                
                <? if( $data['car_menu']->path ) { ?>
                	<a href="<?=$data['car_menu']->path?>" target="_blank" class="pdf">Посмотреть брошюру</a>
                <? } ?>
            </div>
        </section>
        
        <section class="equip fix_width">
        
        	<? if( count($data['complectations']) > 0 ) { ?>
            <h2>Доступные комплектации</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Название комплектации</th><th>Мощность двигателся</th><th>Тип кузова</th><th>Тип КПП</th><th>Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<? foreach( $data['complectations'] as $object ) { ?>
                            <tr>
                               <td<? echo ($object->complectation->title ? "" : " class='no_cell'")?>><?=$object->complectation->title?></td>
                               <td<? echo ($object->engine->title ? "" : " class='no_cell'")?>><?=$object->engine->title?></td>
                               <td<? echo ($object->body->title ? "" : " class='no_cell'")?>><?=$object->body->title?></td>
                               <td<? echo ($object->akpp->title ? "" : " class='no_cell'")?>><?=$object->akpp->title?></td>
                               <td nowrap class="price"><?=fnc::priceFormat($object->price)?></td>
                            </tr>
                       <? } ?>
                    </tbody>
                </table>
            <? } ?>
        
			<? if( $data['car_menu']->price and $data['car_menu']->price > 0 ) { ?>
                <p class="benefit">
                    Выгода до <br /><?=fnc::priceFormat($data['car_menu']->price)?> рублей!
                </p>
            <? } ?>
            <div style="overflow:hidden;">
                <!--<a href="#" class="gray_button"><img src="<?php //echo $this->getAssetsUrl() ?>/img/compare.png" alt="">Сравнить комплектации</a>-->
                <a href="/site/credit/id_car/<?=$data['car_menu']->id?>" class="orange_button fancybox">Взять в кредит</a>
                <a href="/site/buy/id_car/<?=$data['car_menu']->id?>" class="orange_button fancybox">Купить</a>
                <a class="green_button fancybox" href="/site/testdrive/car/<?=$data['car_menu']->id?>"><img src="<?php echo $this->getAssetsUrl() ?>/img/test_drive.png" alt=""><span>Записаться на тест-драйв</span></a>
            </div>
        </section>