<div class="products py-3">
			<div class="container">
				<div class="col-xxl-8 col-xl-9 col-lg-10 col-12 mx-auto px-0">
				<div class="title-bar">
						<hr class="">
						<div class="titletext">
						<p class="h4 ismb text-dark ">
								&nbsp;محصولات&nbsp;
								<span class="text-danger" style="font-size: 1.3rem;
font-family: cinema;"> تخفیف دار </span>
								</p>
							<p class=" text-dark h6 my-0 ms-auto px-3 position-absolute top-0 bottom-0 end-25" style="left: -15%;" ><a href="{{route('site.discount')}}" class="d-flex align-items-center text-dark  ">
						مشاهده بیشتر
						<i class="bi bi-arrow-left d-flex ms-2"></i></a></p>
						</div>
					</div>
				</div>
				<section id="demos">
					<div class="row w-100 m-0">
						<div class="large-12 columns p-1">
							<div class="owl-carousel owl-theme">
							@foreach($most_products as $nn)
							@if($nn->stock_count != 0)
								@include('layouts.site.blocks.product-box',['item' => $nn])
								@endif
								@endforeach
							
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	