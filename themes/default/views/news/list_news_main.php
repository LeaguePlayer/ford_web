<h3><?=$news['title']?></h3>

<? if( count($news['data']) > 0 ) {?>
					<div class="news">
                    
                    	<?  foreach ($news['data'] as $new)  {?>
                            <div class="item">
                                <div class="date"><?=SiteHelper::russianDate($new->create_time)?></div>
                                <a href="/<?=$news['link']?>/<?=$new->id?>" class="link"><?=$new->title?></a>
                            </div>
						<? } ?>
						
                        
						<div class="actions">
							<a href="/<?=$news['link']?>" class="archive"><?=$news['link_text']?></a>
						</div>
					</div>
                    
<? } else { ?>
	<p style="color:#fff;">Нет результата</p>
<? } ?>