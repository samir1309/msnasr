	<header class="header pb-xxl-4 pb-xl-3 pb-lg-2 pb-md-1 pb-0">
		<div id="carouselExampleSlidesOnly" class="carousel carousel-fade slide" data-bs-ride="carousel">
			<div class="carousel-inner">
			@foreach($sliders as $key => $slider)
				<div class="carousel-item active">
				<a @if($slider->link != null) href= "{{@$slider->link}}" rel="noopener
											noreferrer nofollow" @else href=""
											@endif>
					<img srcset="{{asset('assets/uploads/content/sli/'.@$slider->image)}} 2x, {{asset('assets/uploads/content/sli/'.@$slider->image)}} 1x" src="{{asset('assets/uploads/content/sli/'.@$slider->image)}}" class="d-block w-100 text-secondary text-center h2 m-0" alt="{!! @$slider->title !!}">
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</header>