// owl carousel
$(document).ready(function () {
	var owl = $('.owl-carousel');
	owl.owlCarousel({
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayHoverPause: true,
		responsiveClass: true,
		rtl: true,
		lazyLoad: true,
		lazyLoadEager: 1,
		dots: false,
		
		responsive: {
			0: {
				items: 1.5,
				nav: true,
			},
			576: {
				items: 2.25,
				nav: true,
			},
			768: {
				items: 3,
				nav: false,
			},
			992: {
				items: 4,
				nav: false,
			},
			1200: {
				items: 5,
				nav: true,
			},
			1400: {
				items: 5,
				nav: true,
			}
		}
	});
	$('.play').on('click', function () {
		owl.trigger('play.owl.autoplay', [4000])
	})
	$('.stop').on('click', function () {
		owl.trigger('stop.owl.autoplay')
	})
})
// owl carousel brd
$(document).ready(function () {
	var owl = $('.owl-carousel-brd');
	owl.owlCarousel({
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayHoverPause: true,
		responsiveClass: true,
		dots: false,
		nav: false,
		rtl: true,
		lazyLoad: true,
		lazyLoadEager: 1,
		responsive: {
			0: {
				items: 2.5,
			},
			576: {
				items: 3,
			},
			768: {
				items: 4,
			},
			992: {
				items: 5,
			},
			1200: {
				items: 6,
			},
			1400: {
				items: 6,
			}
		}
	});
	$('.play').on('click', function () {
		owl.trigger('play.owl.autoplay', [4000])
	})
	$('.stop').on('click', function () {
		owl.trigger('stop.owl.autoplay')
	})
})

// price range
(function ($) {
	$('#price-range-submit').hide();
	$("#min_price,#max_price").on('change', function () {
		$('#price-range-submit').show();
		var min_price_range = parseInt($("#min_price").val());
		var max_price_range = parseInt($("#max_price").val());
		if (min_price_range > max_price_range) {
			$('#max_price').val(min_price_range);
		}
		$("#slider-range").slider({
			values: [min_price_range, max_price_range]
		});
	});
	$("#min_price,#max_price").on("paste keyup", function () {
		$('#price-range-submit').show();
		var min_price_range = parseInt($("#min_price").val());
		var max_price_range = parseInt($("#max_price").val());
		if (min_price_range == max_price_range) {
			max_price_range = min_price_range + 100;
			$("#min_price").val(min_price_range);
			$("#max_price").val(max_price_range);
		}
		$("#slider-range").slider({
			values: [min_price_range, max_price_range]
		});
	});
	$(function () {
		$("#slider-range").slider({
			range: true,
			orientation: "horizontal",
			min: 0,
			max: 10000000,
			values: [0, 10000000],
			step: 100,
			slide: function (event, ui) {
				if (ui.values[0] == ui.values[1]) {
					return false;
				}
				$("#min_price").val(ui.values[0]);
				$("#max_price").val(ui.values[1]);
			}
		});
		$("#min_price").val($("#slider-range").slider("values", 0));
		$("#max_price").val($("#slider-range").slider("values", 1));
	});
	$("#slider-range,#price-range-submit").click(function () {
		var min_price = $('#min_price').val();
		var max_price = $('#max_price').val();
		$("#searchResults").text("Here List of products will be shown which are cost between " + min_price + " " + "and" + " " + max_price + ".");
	});
})(jQuery);

// sidenav
function openNav() {
	document.getElementById("mySidenav").style.right = "0";
}
function closeNav() {
	document.getElementById("mySidenav").style.right = "100%";
}

// scrolled
$(function () {
	var header = $(".menu");
	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		if (scroll >= 100) {
			header.addClass("scrolled");
		} else {
			header.removeClass("scrolled");
		}
	});
});

// 
