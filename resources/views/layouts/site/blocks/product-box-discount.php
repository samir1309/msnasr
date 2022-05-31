<div class="item py-3">
	
	<a href="">
		<div class="card">
			<div class="overlay-top">
		@if($item->calcute > 0)
		<div class="sp-discount">
			<p class="m-0">
				تخفيف ويژه
			</p>
		</div>
		@endif
	</div>
			<figure>
				<div class="figure">
				
							<img srcset="{!! $item->pro_image !!} 2x, {!! $item->pro_image !!} 1x"
src="{!! $item->pro_image !!}" alt="{{@$item->title}}" class="swiper-lazy" loading="lazy">
				</div>
			</figure>
			<div class="star-ratings-sprit mx-auto my-3">
				<span class="star-ratings-sprit-rating"
					style="width: 70%;"></span>
			</div>
			<div class="name">
				<p class="name2">
				{{@$item->title}}
				</p>
			</div>
				<div class="price">
@if($item->calcute > 0)
<div class="old text-secondary">
<del>
{!! $item->price_first['old'] !!}
</del>
</div>
<div class="off">
<span class="badge bg-one text-dark fw-bolder">
{{round($item->calcute)}}%
</span>
</div>
@else
<div class="d-flex" style="opacity:0">
<div class="old text-secondary">
<del>
{!! $item->price_first['old'] !!}
</del>
</div>
<div class="off">
<span class="badge bg-one text-dark fw-bolder">
{{round($item->calcute)}}%
</span>
</div>
</div>
@endif
</div>
@if($item->stock_count == 0)
<p class="prc fw-bolder">
ناموجود
</p>
@else
<p class="prc fw-bolder text-dark text-center font-weight-bold  ">
{!! $item->price_first['price'] !!}
</p>
@endif
<div class="colors d-flex align-items-center justify-content-center" style="height: 1.5rem;">
@if($item->colors->count() > 0)
@php
$c=@$item->category[0]->specification_title;
@endphp
<p class="m-0">
در {{$item->colors->count()}}
@if($item->specification_title != null)
{{$item->specification_title}}
@else
{{@$c}}
@endif
</p>
@endif
</div>
		</div>
	</a>
</div>