(function ($) {
	$(document).ready(function(){
		"use strict";


		$("main .product .productSlide").slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 3,
			autoplay: true,
			centerMode: true,
			variableWidth: false,
			centerPadding:0,
			rows:1,
			arrows:true,
			focusOnSelect: true,
			responsive: [
				{
					breakpoint: 1025,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 641,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						swipeToSlide:true,
					}
				},
				{
					breakpoint: 361,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						swipeToSlide:true,
					}
				},
			]
		});

		$(".tuvanBtn").click(function() {
			$('.popup').fadeOut(0);
			$('.popup#tuvanPopup').fadeIn(200);
		});

		$(".popup .popupClose").click(function() {
			$('.popup').fadeOut(0);
		});


	});
})(jQuery)