	<!-- SCRIPT -->
		<script src="{{asset('assets/site/js/owlcarousel/highlight.js')}}"></script>
		<script src="{{asset('assets/site/js/owlcarousel/app.js')}}"></script>
		<script src="{{asset('assets/site/js/magiczoomplus.js')}}"></script>
		<script src="{{asset('assets/site/js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/site/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/site/js/app.js')}}"></script>
		<script src="{{asset('assets/site/js/sweetalert.min.js')}}"></script>
		<script src="https://unpkg.com/vue-observe-visibility/dist/vue-observe-visibility.min.js"></script>
		

		@yield('js')
		@include('layouts.site.blocks.vue')

	<script>
		var mzOptions = {
			zoomWidth: 300,
			zoomHeight: 300,
			zoomMode: "magnifier",
			history: false,
			hint: "always",
			lazyZoom: true,
			rightClick: true,
			cssClass: "sd",
			textHoverZoomHint: "ماوس را براي بزرگنمايي نگه داريد",
			textClickZoomHint: "براي بزرگنمايي کليک کنيد",
			textBtnClose: "بستن",
			textBtnNext: "بعدي",
			textBtnPrev: "قبلي",
		};
	</script>
	<script>
		(function () {
			window.inputNumber = function (el) {
				var min = el.attr('min') || false;
				var max = el.attr('max') || false;
				var els = {};
				els.dec = el.prev();
				els.inc = el.next();
				el.each(function () {
					init($(this));
				});
				function init(el) {
					els.dec.on('click', decrement);
					els.inc.on('click', increment);
					function decrement() {
						var value = el[0].value;
						value--;
						if (!min || value >= min) {
							el[0].value = value;
						}
					}
					function increment() {
						var value = el[0].value;
						value++;
						if (!max || value <= max) {
							el[0].value = value++;
						}
					}
				}
			}
		})();
		inputNumber($('.input-number'));
	</script>
		<!-- vue -->
	
	
