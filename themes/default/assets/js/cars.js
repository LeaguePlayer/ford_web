$(document).ready(function(){
	
		$(window).scroll(function () { 
	
	
				var startOffset 		=  $('#group_table_benefit').offset().top;
				var place_for_animate = $('#group_table_benefit').height();
				var scroll_now = $(document).scrollTop();
				var window_height = $(window).height();
				//console.log(scroll_now);
				
				
				
				
				if(scroll_now>=startOffset-100 && scroll_now<=place_for_animate+startOffset-100)
				{
					$('#slide_for_benefit').css('top',scroll_now-startOffset+100);
				}
				
				if(scroll_now+window_height-200>=startOffset-100 && scroll_now+window_height<=place_for_animate+startOffset)
				{
					/*
					$('#slide_for_benefit').css('top',scroll_now-startOffset+100);
					
					$('.list_menu').animate({bottom:"0px"},400);
					*/
					if ( $('.list_menu').is(':animated')==false && ( parseInt($('.list_menu').css('bottom')) == -78 || $('.list_menu').css('bottom')=='auto' ) )
					{
						$('.list_menu').css('position','fixed');
						$('.list_menu').addClass('shadow');
						$('.list_menu').animate({bottom:"0px"},400);
						
					}
					
				}
				else if(startOffset + place_for_animate < scroll_now+window_height)
				{
					
					if ( $('.list_menu').is(':animated')==false && ( parseInt($('.list_menu').css('bottom')) == 0 || $('.list_menu').css('bottom')=='auto' ) )
					{
							$('.list_menu').css('bottom','-78px');
							$('.list_menu').css('position','static');
							$('.list_menu').removeClass('shadow');
						
					}
					
					
				}
				else
				{
					if ( $('.list_menu').is(':animated')==false && parseInt($('.list_menu').css('bottom')) == 0 )
					{
							$('.list_menu').animate({bottom:"-78px"},400,function(){
								
									
									$('.list_menu').css('position','static');
									$('.list_menu').removeClass('shadow');
									
							});
							
							
						
					}
				}
			
				
			});
	
});