<div class="others-item">
		<img src="<?=$spisok->getThumb('for_list')?>" alt="" class="others-image">
		<div class="others-content">
        
        
        		<? if( $id_type==1 ) { ?>
                        <a href="/stock/<?=$spisok->id?>" class="others-link"><?=$spisok->title?></a>
                   <? } else { ?>
                       <a href="/news/<?=$spisok->id?>" class="others-link"><?=$spisok->title?></a>
                   <? } ?>
				
            
			<div class="others-text">
            
            	    <?=$spisok->super_short_desc?>
					
                
               </div>
               
				   <? if( $id_type==1 ) { ?>
                   			<? if( $spisok->id_car ) { ?>
                        <a href="/cars/view/id_car/<?=$spisok->id_car?>" class="green_button see">Посмотреть автомобиль</a>
                        	<? } ?>
                   <? } else { ?>
                        <a href="/news/<?=$spisok->id?>" class="green_button see">Прочитать новость</a>
                   <? } ?>
                   
		</div>
	</div>