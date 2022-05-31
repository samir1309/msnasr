<div class="products py-3">
			<div class="container">
				<div class="col-xxl-8 col-xl-9 col-lg-10 col-12 mx-auto px-0">
				@include('layouts.site.blocks.title-bar')
				</div>
				<section id="demos">
					<div class="row w-100 m-0">
						<div class="large-12 columns p-1">
							<div class="owl-carousel owl-theme">
							@foreach($new_products as $new)
								@include('layouts.site.blocks.product-box',['item' => $new])
								@endforeach
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	