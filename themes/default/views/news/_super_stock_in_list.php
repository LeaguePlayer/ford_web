 <? if($stock->super_img) { ?>
 	<img src="<?=$stock->super_image_behaver->getThumb('for_list')?>" alt="" class="first-image" style="position: relative; left: -90px;">
 <? } ?>
            <div class="first-content">
                <h2 class="first-header"><?=$stock->super_title?></h2>
                <h1 class="first-title"><?=$stock->super_short_desc?></h1>
                <p class="first-description"><?=$stock->super_full_desc?></p>
                <a href="/stock/<?=$stock->id?>" class="first-link">Узнать подробнее</a>
            </div>
            
          