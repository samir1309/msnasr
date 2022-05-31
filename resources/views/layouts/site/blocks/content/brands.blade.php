<div class="brd py-5">
			<div class="container">
				<div class="col-xxl-8 col-xl-9 col-lg-10 col-12 mx-auto px-0 pb-3">
				<div class="title-bar">
						<hr class="">
						<div class="titletext">
						<p class="h4 ismb text-dark ">
								&nbsp;برندهای&nbsp;
								<span class="text-danger" style="font-size: 1.3rem;
font-family: cinema;"> معتبر </span>
								</p>
							<p class=" text-dark h5 my-0 ms-auto px-3 position-absolute top-0 bottom-0 end-25" style="left: -15%;" ><a href="{{route('site.brand.list')}}" class="d-flex align-items-center text-dark  ">
						مشاهده بیشتر
						<i class="bi bi-arrow-left d-flex ms-2"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-12 px-2">
					<div class="card">
						<section id="demos">
							<div class="row w-100 m-0">
								<div class="large-12 columns p-1">
									<div class="owl-carousel-brd owl-theme">
									@foreach($brands as $brand)
										<div class="item py-3">
											<a href="">
												<figure>
													<div class="figure">
													<a href="">
								<img srcset="{{$brand->brand_image}} 2x, {{$brand->brand_image}} 1x" src="{{$brand->brand_image}}" alt="{!! @$brand->title !!}">
							</a>
													</div>
												</figure>
											</a>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		