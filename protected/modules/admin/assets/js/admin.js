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

function getParams(){
		
		var id_car = $('#Carssitespublic_id_car').val();
		
				$.ajax({
							   url: '/admin/carssitespublic/addparams/type/complectation',
							  type: "POST",
							  data: "data[id_car]="+id_car,
							  
							  success: function(data) {
								//  alert(data);
								$('#Carssitespublic_id_complecations').html(data);
							  }
				});
				
				$.ajax({
							   url: '/admin/carssitespublic/addparams/type/akpp',
							  type: "POST",
							  data: "data[id_car]="+id_car,
							  
							  success: function(data) {
							//	  alert(data);
								$('#Carssitespublic_id_akpp').html(data);
							  }
				});
				
				$.ajax({
							   url: '/admin/carssitespublic/addparams/type/engine',
							  type: "POST",
							  data: "data[id_car]="+id_car,
							  
							  success: function(data) {
							//	  alert(data);
								$('#Carssitespublic_id_engine').html(data);
							  }
				});
				
				$.ajax({
							   url: '/admin/carssitespublic/addparams/type/body',
							  type: "POST",
							  data: "data[id_car]="+id_car,
							  
							  success: function(data) {
								//  alert(data);
								$('#Carssitespublic_id_body').html(data);
							  }
				});
		
	}

function deleteRow()
{
	
	
	
	$('.results a.del_b').click(function(){
		if (confirm("Уточно удалить?")) {
		  var type = $(this).parents('.results').next().find('#data_type').val();
			var link_a = $(this).attr('href');
			
			var result_obj = $(this).parents('.results');
			
					$.ajax({
						  url: link_a,
						  type: "POST",
						  data: "data[type]="+type,
						  
						  success: function(data) {
							$(result_obj).html(data);
							deleteRow();
						  }
						}); 
		}

		
		
		return false;
	});	
}

$(document).ready(function(e) {
	deleteRow();
	
	$('.options_b').fancybox({
		type: 'iframe',
		
		
		width:650,
		//padding: 20,
		//fitToView: false,
	});
	
	if($('#new_record').is('div'))
	{
		getParams();
	}
	//
	$('#Carssitespublic_id_car').change(getParams);

	
	$('.object a').click(function(){
		
		var type = $(this).parent().find('#data_type').val();
		var id_car = $(this).parent().find('#data_id_car').val();
		var title = $(this).parent().find('#data_title').val();
	
		
		$(this).parent().find('#data_title').val("");
	   
	   var result_obj = $(this).parent().prev('.results');
		
		$.ajax({
			  url: '/admin/carssitespublic/parts/',
			  type: "POST",
			  data: "data[type]="+type+"&data[id_car]="+id_car+"&data[title]="+title,
			  
			  success: function(data) {
				
				if(data=="SUCCESS")
				{
					$.ajax({
					  url: '/admin/carssitespublic/parts/param/true',
					  type: "POST",
					  data: "data[id_car]="+id_car+"&data[type]="+type,
					  
					  success: function(data) {
						 $(result_obj).html(data);
						 deleteRow();
					  }
					});   	
				}
				else
				{
					alert(data);	
				}
				
				
				
			  }
			});   
		
	});
	
	
	
    $('#News_id_type').change(showHideElements);
	
	$(".fancybox").fancybox({
		type: 'ajax',
		afterShow: function() {
			//$this = $(this);
			$("form").find('select').selectbox();
			
		},
		arrows: false,
		padding: 20,
		fitToView: false,
	});
	
	showHideElements();
});