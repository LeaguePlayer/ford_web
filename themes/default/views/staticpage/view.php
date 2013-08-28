<div id="content">

	<? if($model->image) {?>
        <section class="discount-img fix_width">
            
                <img src="<?=$model->getThumb('big')?>" alt="">
            
        </section>
    <? }?>

<section class="discount fix_width">
	<h3><?=$model->title?></h3>
	<div class="ford">
		
		<?=$model->html_content?>
        
        <? if( $show_interest ) { ?>
        	<? if( $model->id_car ) { ?>
                <div class="intrest">
                    <h2>Заинтересовало предложение?</h2><a href="/cars/<?=$model->id_car?>" class="green_button">Перейти к предложению</a>
                </div>
            <? } ?>
        <? } ?>
        
	</div>
	
</section>

<!--END-content-->

	<section class="site_map four">
			<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
	</section>