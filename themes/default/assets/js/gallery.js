$(document).ready(function() {

var last;
/*
	$('.choose').click(function(){
		$('.car-list').slideToggle(1000);
		return false;
		
	});

	$('.car').click(function(){
		$('.car-list').slideUp(1000, function(){
			location.href = "#";
		});
		return false;
	});
*/

	$('.gThumb').hover(function(){
		$(this).css({'padding':'10px', 'margin':'-7px'});
		$(this).animate({'background-color':'#ffb040'});
	},
		function(){
					$(this).stop(true, true);
					$(this).attr('style', '');
				}
				);

	/*$('.gThumb').click(function(){
	markThumb($(this).attr('tid'));
	});


	var markThumb = function(id) {

		$("[tid='"+last+"']").attr('style', '');
		$("[tid='"+id+"']").css({'background-color':'#ffb040', 'padding':'10px', 'margin':'-7px'});
		last = $("[tid='"+id+"']").attr('tid');
	};
	*/


});