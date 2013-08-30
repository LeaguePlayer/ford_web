
<? foreach ( $slider as $slide ) { ?>
    <div class="viewport">
           <img src="<?=$slide->getThumb('big')?>" alt="" data-id="1" style="position: absolute; top: 0; left: 0;">
    </div>
    <? break; ?>
<? } ?>

<? $n = 1; $z = 1;?>

                
                	
                <div class="images" style="display: none">
					<? foreach ( $slider as $slide ) { ?>
                    
                         <img src="<?=$slide->getThumb('big')?>" alt="" data-id="<?=$n?>">
                            <div class="info" data-id="<?=$n?>">
                                <h2><?=$slide->title?></h2>
                                <? if($slide->html_content) { ?>
                               	 	<? echo $slide->html_content ?>
                                <? } ?>
                                <? if($slide->link) { ?>
                               	 	<a href="<? echo $slide->link ?>">Читать подробнее</a>
                                <? } ?>
                                
                            </div>
                    	<? $n++; ?>
                    <? } ?>
                    
        		</div>
                
                <div class="thumbs_wrap fix_width">
				<ul class="thumbs">
                	<? foreach ( $slider as $slide ) { ?>
                            <li class="thumb" data-id="<?=$z?>">
                                <a href="<?=$z?>">
                                    <span class="title"><?=$slide->title?></span>
                                    <img src="<?=$slide->getThumb('small')?>" alt="">
                                </a>
                            </li>
                        <? $z++; ?>
                    <? } ?>
				</ul>
				<div class="clear"></div>
			</div>
               
                   
                  
                