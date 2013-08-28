<? if(count($stocks) > 0) { ?>
    <ul class="special_items">
    	<? foreach ($stocks as $stock) {?>
            <?=$this->renderPartial('/news/_list_stock',array('stock'=>$stock))?>
        <? }?>
    </ul>
<? }?>