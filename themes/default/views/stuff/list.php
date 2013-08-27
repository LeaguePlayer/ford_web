<? if( count($stuff) > 0 ) {?>
<div class="paragraph about teams">
				<h2>СОТРУДНИКИ</h2>
                    
                    <? foreach ($stuff as $object) {?>
                    
                        <div class="team">
                            <img src="<?=$object->getThumb('medium')?>" alt="">
                            <p class='name'><?=$object->title?></p>
                            
                            <? if($object->short_desc) {?>
                            	<p class="position"><?=$object->short_desc?></p>
                            <? }?>
                        </div>
                    
                    <? } ?>
                    
			</div>
<? } ?>