function showHideElements()
{
	 var this_val = $('#News_id_type').val();
		
		if(this_val==1)
		{
			$('.for_stock').stop(true,true).show(350);
		}
		else
		{
			$('.for_stock').stop(true,true).hide(350);
		}
}

$(document).ready(function(e) {
    $('#News_id_type').change(showHideElements);
	
	$(".fancybox").fancybox({
		type: 'ajax',
		afterShow: function() {
			//$this = $(this);
			$("form").find('select').selectbox();
			
		},
		
		padding: 20,
		fitToView: false,
	});
	
	showHideElements();
});