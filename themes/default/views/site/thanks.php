<div id="content">



<section class="discount fix_width">
	<h3><?=$data['page']->title?></h3>
	<div class="ford">
		
		<?=$data['page']->html_content?>
        
	</div>
	
</section>

<!--END-content-->

	<section class="site_map four">
			<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
	</section>
</div>