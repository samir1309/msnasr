
<div class="col-12 products px-2 pt-4 pb-2">
						<div class="col-xxl-8 col-xl-9 col-lg-10 col-12 mx-auto px-0">
							<div class="title-bar">
								<hr class="">
								<div class="titletext">
									<h4 class="h4 ismb">
										محصولات مرتبط
									</h4>
								</div>
							</div>
						</div>
						<section id="demos">
							<div class="row w-100 m-0">
								<div class="large-12 columns p-1">
									<div class="owl-carousel owl-theme">
									  @foreach($relate as $row2)

									  @include('layouts.site.blocks.product-box',['item' => $row2])
									  
									  @endforeach
								
								</div>
								</div>
							</div>
						</section>
					</div>
			