<div id="content">

<? if( $data['id_type'] == 1 ) { ?>
	<? if( count($data['super_stock'] > 0) ) { ?>
        <section class="ford_first fix_width">
            	<?=$this->renderPartial('_super_stock_in_list',array('stock'=>$data['super_stock']))?>
        </section>
    	<? } ?>
<? } ?>

<section class="others fix_width">
	<h3 class="others-header">
		<? echo $data['title'] ?>
	</h3>
    
<? if( count($data['spisok'] > 0) ) { ?>   
	
    <? foreach ($data['spisok'] as $spisok) { ?>   
	
    	<?=$this->renderPartial('_new_stock',array('spisok'=>$spisok,'id_type'=>$data['id_type']))?>
    
	<? } ?>
    
<? } ?>

</section>
<!--END-content-->

	<section class="site_map four">
				<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
	</section>
</div>