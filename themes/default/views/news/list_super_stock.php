<? if(is_object($stock)) {?>
				<div class="spec_big">
					<a href="/stock/<?=$stock->id?>"><img src="<?=$stock->super_image_behaver->getThumb('medium')?>" alt=""></a>
					<div class="description">
						<h3><?=$stock->super_title?></h3>
						<? if($stock->super_short_desc) {?>
                        	<p><?=$stock->super_short_desc?></p>
                        <? }?>
                        
                        
                        	<a href="/stock/<?=$stock->id?>" class="detail">Узнать подробнее</a>
                        
						
                        
					</div>
				</div>
<? }?>
                