<div id="content">
	<section class="tradein fix_width">
	<h3 id="thanks-header"><?=$data['page']->title?></h3>
    
	<?=$data['page']->html_content?>
    
	

	</section>

<!--END-content-->

	<section class="site_map four">
			<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
		</section>
</div>