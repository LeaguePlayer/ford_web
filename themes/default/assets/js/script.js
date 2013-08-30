
$(document).ready(function() {
$("select").selectbox();
	$(".fancybox").fancybox({
		type: "ajax",
		afterShow: function() {
			//$this = $(this);
			$("select").selectbox();
		},
		padding: 0,
		fitToView: false,
	});


	$('#header .test a').mouseenter(function() {
		$(this).next('.hint').stop(true, true).fadeIn(200);
	});

	$('#header .test a').mouseleave(function() {
		$(this).next('.hint').stop(true, true).hide();
	});


	slider();
	headShadow();


	ymaps.ready(function () {
		var myMap;
		// Создание экземпляра карты и его привязка к созданному контейнеру.
		ymaps.geocode('Тюмень, ул. Республики, 278 ', {
            results: 1
        }).then(function (res) {
			var firstGeoObject = res.geoObjects.get(0);
            myMap = new ymaps.Map("map_canvas", {
				center: firstGeoObject.geometry.getCoordinates(),
				zoom: 14,
				behaviors: ['scrollZoom']
			});

        	// Создание метки
			var myPlacemark = window.myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
				iconImageHref: '/assets/img/marker.png',
			    // Не скрываем иконку при открытом балуне.
				// hideIconOnBalloonOpen: false,
			    // И дополнительно смещаем балун, для открытия над иконкой.
				// balloonOffset: [3, -30]
			});

			myMap.geoObjects.add(myPlacemark);
        });
	});
});


/* Слайдер */

function slider() {

	///параметры///
	var slideChangeInterval = 1000; //скорость смены слайда
	var slideTimer = 10000; //задержка автосмены слайда
	//////////////

	var currentThumb = $('.slider .thumbs').find('.current').first();
	var viewport = $('.slider .viewport');
	var images = {};
	var thumbs = {};
	var descriptions = {};
	$('.slider .images img').each(function() {
		images[$(this).data('id')] = $(this);
	});
	$('.slider .images div').each(function() {
		descriptions[$(this).data('id')] = $(this);
	});
	$('.slider .thumbs .thumb').each(function() {
		thumbs[$(this).data('id')] = $(this);
	});
	var currentImage = viewport.find('img');

	var processSlide = function(idSlide) {
		var backImage = images[idSlide].clone();

		currentImage.css({
			position: 'absolute',
			zIndex: 10,
			top: 0,
			left: 0,
		});

		backImage.css({
			position: 'absolute',
			zIndex: 0,
			top: 0,
			left: 0,
		});


		viewport.append(backImage);
		currentImage.stop().fadeOut(300, function() {
		currentImage.remove();
		currentImage = backImage;
		});
	}

	var changeDescription = function(idSlide) {
		var nextDescription = descriptions[idSlide].clone();
		var startPosition =  ($(window).width()/2-$(viewport).width()/2+350)*-1;
		nextDescription.css({'left':startPosition});
		var slideTarget = $(window).width()+350;
		var slideTargetLeft = 0;
		

		viewport.find('div.info').stop(true, true).animate({left: slideTarget, opacity: 0}, slideChangeInterval, function() {
			$(this).remove();
		});

		viewport.prepend(nextDescription);
		nextDescription.css({'opacity':'0'});
		nextDescription.stop(true, true).animate({opacity: 1, left:600}, slideChangeInterval);
	}


	var changeThumb = function(idSlide) {
		var thumb = thumbs[idSlide];

		if ( currentThumb !== null ) {
			currentThumb.removeClass('current').stop(true, true).animate(
				{
					borderColor: 'rgba(255, 174, 64, 0)',
					top: 0,
				}, slideChangeInterval
			);
		}
		thumb.addClass('current').stop(true, true).animate(
			{
				borderColor: 'rgba(255, 174, 64, 1)',
				top: -10,
			}, slideChangeInterval
		);
		currentThumb = thumb;
	}

	var timerHandle;

	$('.slider .thumb a').click(function() {
		var idSlide = $(this).attr('href');
		clearTimeout(timerHandle);
		changeThumb(idSlide);
		processSlide(idSlide);
		changeDescription(idSlide);
		timerHandle =  setTimeout(autoSlide, slideTimer);
		return false;
	});
	
	var autoSlide = function(){
		
		var next = currentImage.data('id')+1;
		var last = $('.slider .images img:last').attr('data-id');

		if((last-next)<0) {
				next=1;
		}

		processSlide(next);
		changeDescription(next)
		changeThumb(next);
		timerHandle =  setTimeout(autoSlide, slideTimer);
	}

	if ($('.slider').is('section')) 
	{
		timerHandle = setTimeout(autoSlide, slideTimer);
		changeDescription(1);
		changeThumb(1);
	}
}

function headShadow() {
	var header = $('#shadow');

	$(window).scroll(function(){
		var top = $(this).scrollTop();

		if (top>75) {
			if ( !header.data('shadowed') ) {
				header.fadeIn(300);
				header.data('shadowed', true);
			}
		} else {
			header.fadeOut(300);
			header.data('shadowed', false);
		}

	});
}