
$(document).ready(function() {

	$(".fancybox").fancybox({
		afterShow: function() {
			//$this = $(this);
			$("form").find('select').selectbox();
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
	headFade();


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

	var currentThumb = $('.slider .thumbs').find('.current').first();
	var viewport = $('.slider .viewport');
	var images = {};
	$('.slider .images img').each(function() {
		images[$(this).data('id')] = $(this);
	});
	var currentImage = viewport.find('img');
	//var currentImageId = currentImage.data('id');



	var processSlide = function(backImage) {
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

		//backImage.stop().fadeIn(300);
		viewport.append(backImage);
		currentImage.stop().fadeOut(300, function() {
			currentImage.remove();
			currentImage = backImage;
		});
	}



	$('.slider .thumb a').click(function() {
		// Тумбы
		var thumb = $(this).parents('.thumb');
		if ( currentThumb !== null ) {
			currentThumb.removeClass('current').stop(true, true).animate(
				{
					borderColor: 'rgba(255, 174, 64, 0)',
					top: 0,
				}, 300
			);
		}
		thumb.addClass('current').stop(true, true).animate(
			{
				borderColor: 'rgba(255, 174, 64, 1)',
				top: -10,
			}, 300
		);
		currentThumb = thumb;



		// Слайдер
		var backendImageId = $(this).attr('href');
		var backendImage = images[backendImageId].clone();
		processSlide(backendImage);


		return false;
	});
}

function headFade() {
	$(window).scroll(function(){
		var top = $(this).scrollTop();
	console.log(top);

	if (top==350) {
		$('#header').css('')
	}

	});
}
