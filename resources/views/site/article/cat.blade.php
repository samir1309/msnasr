@extends('layouts.site.master')

@section('content')

<main class="content">
		<div class="blog blog-list pb-5 pt-3">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-12 px-2 py-md-4 py-1">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb p-0 m-0">
								<li class="breadcrumb-item">
									<a href="/">
										<i class="bi bi-house me-1"></i>
										خانه
									</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									دسته بندی مقالات
								</li>
							</ol>
						</nav>
					</div>
					   @foreach($blogs as $blog)
					   
					<div class="col-lg-3 col-sm-6 p-2">
				
						<a href="{{url('/article-list',['id'=>$blog->id])}}">
							<div class="card p-0">
								
								<img class="imgblog" @if(file_exists('assets/uploads/content/art/big/'.$blog->image)) src="{{asset('assets/uploads/content/art/big/'.$blog->image)}}" alt="{{@$blog->title}}" @else src="{{asset('assets/site/images/notfound.png')}}" @endif />

								<div class="cont">
									<p class="ismb title">
										{{@$blog->title}}
									</p>
								</div>
							</div>
						</a>
					</div>
					 @endforeach
						</div>
                           
			</div>
			</div>
		</div>
	</main>
	
@stop
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
			textHoverZoomHint: "ماوس را برای بزرگنمایی نگه دارید",
			textClickZoomHint: "برای بزرگنمایی کلیک کنید",
			textBtnClose: "بستن",
			textBtnNext: "بعدی",
			textBtnPrev: "قبلی",
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

