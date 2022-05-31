@extends('layouts.site.master')

@section('content')
<div class="pro pro-details  pt-3">
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
									@if($product->cats->count() >0)
									<li class="breadcrumb-item" aria-current="page">
										<a
											href="{{route('site.product.list',['id'=>$product->cats[0]->id])}}">
											{{@$product->cats[0]->title}}
										</a>
									</li>
									@if($product->cats->count() >1)
									<li class="breadcrumb-item" aria-current="page">
										<a
											href="{{route('site.product.list',['id'=>$product->cats[1]->id])}}">
											{{@$product->cats[1]->title}}
										</a>
									</li>
									@endif
									@endif
								<li class="breadcrumb-item active" aria-current="page">
								{{@$product->title}}
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-12 p-2">
						<div class="bg-white  rounded-custom p-2">
							<div class="row w-100 m-0">
								<div class="col-xl-4 col-lg-4 col-sm-6   p-2 border border-light">
									<div class=" bg-white " id="v-pills-tabContent" >
													
										<button class="btn btn-light w-auto " data-bs-toggle="modal"
										data-bs-target="#shareModal">
									<i class="bi bi-share d-flex h6 max-content my-0 mx-auto justify-content-center"></i>
										<div class="over-tool">
											
										</div>
										</button>
									@php

										$likes =
										\App\Models\Like::where('likeable_id',$product->id)->where('likeable_type','App\Models\Product')->where('user_id',\Illuminate\Support\Facades\Auth::id())->first();

									@endphp
									@if(!isset($likes))
										<form action="{{URL::action('App\Http\Controllers\Panel\LikeController@postLike')}}" method="post" class="m-0 d-inline">
										
											<input type="hidden" name="likeable_type" value="{{'App\Models\Product'}}">
											<input type="hidden" name="likeable_id" value="{{$product->id}}">
										
												<button type="submit" class="btn p-0 btn-lg btn btn-light w-auto d-inline  p-2" id=heart>
													<i class="bi bi-heart text-danger  h6 my-0"></i>
												</button>
										
										</form>
									@else
										
											<a href="{{URL::action('App\Http\Controllers\Panel\LikeController@getDeleteLike',$likes->id)}}"
											class="btn p-2 bg-light">
												<i class="bi bi-suit-heart-fill text-danger d-flex h6 my-0"></i>
											</a>
									
									@endif
								
																
																			
																	@if($product->colors->count() != 0 || $product->images->count() >0)
																		@if($product->colors->count() != 0)
																		@foreach($product->colors as $key=>$color)
																	
																		<div class="tab-pane fade @if($key==0) show active @endif"
																						id="v-pills-{{$color->id}}" role="tabpanel"
																						aria-labelledby="v-pills-{{$color->id}}-tab">
																						
																				@if($color->sp_images->count() != 0)
																					<div class="app-figure" id="zoom-fig" >
																						
																				
																					<a id="Zoom-{{$color->id}}" class="MagicZoom w-100" href="{{@$color->sp_images[0]->pro_image}}">
																						<img src="{{@$color->sp_images[0]->pro_image}}?scale.height=400" alt="{{@$product->title}}" />
																					</a>
																					<div class="selectors">
																						<section id="demos">
																							<div class="row">
																								<div class="large-12 columns">
																									<div class="owl-carousel-zoom owl-theme my-0">
																										@foreach($color->sp_images as $img)
																										<div class="item border d-flex">
																										
																										<a data-zoom-id="Zoom-{{$color->id}}" class="w-100 border-0" href="{{$img->pro_image}}" data-image="{{$img->pro_image}}">
																											<figure>
																											<div class="figure">
																													<div class="figure-inn">
																														<img srcset="{{$img->pro_image}}" class="w-100 border-0 shadow-none" src="{{$img->pro_image}}" />
																													</div>
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
																					@elseif($color)
											<div class="app-figure w-100 m-0" id="zoom-fig">
												<a id="Zoom-1" class="MagicZoom w-100" href="{{@$product->pro_image}}">
													<img src="{{@$product->pro_image}}?scale.height=400" alt="{{@$product->pro_image}}" />
												</a>
												<div class="selectors">
													<section id="demos">
														<div class="row">
															<div class="large-12 columns">
																<div class="owl-carousel-zoom owl-theme my-0">
																	<div class="item border d-flex">
																		<a data-zoom-id="Zoom-1" class="w-100 border-0" href="{{$product->pro_image}}"
																			data-image="{{$product->pro_image}}">
																			<div class="figure">
																				<div class="figure-inn">
																					<img srcset="{{$product->pro_image}}"
																						class="w-100 border-0 shadow-none"
																						src="{{$product->pro_image}}" />
																				</div>
																			</div>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
											</div>

														@endif

													</div>
												</div>
											
											@endforeach
											@else
											@foreach($product->images as $image)
											<div class="app-figure w-100 m-0" id="zoom-fig">
												<a id="Zoom-1" class="MagicZoom w-100"
													style="background-color:#fc8e6d;"
													href="{{asset('assets/site/images/notfound.png')}}">
													<img src="{{asset('assets/site/images/notfound.png')}}?scale.height=400"
														alt="" />
												</a>
											</div>
											@endforeach
											
											@endif
											@else
											<div class="app-figure w-100 m-0" id="zoom-fig">
												<a id="Zoom-1" class="MagicZoom w-100"
													style="background-color:#fc8e6d;"
													href="{{asset('assets/site/images/notfound.png')}}">
													<img src="{{asset('assets/site/images/notfound.png')}}?scale.height=400"
														alt="" />
												</a>
											</div>
											@endif
											
							
									</div>
					
										
								</div>
								
								<div class="col-xl-5 col-lg-4 col-sm-6   p-2">
									<h1 class="ismb m-0">
									{{@$product->title}}
										<br>
									{{@$product->title_en}}
									</h1>
									
									@include('site.products.contents.rate-comm')
								
								 <hr class="my-3">
									<div class="attributes">
										@if(count($top_properties) > 0)
										<h4 class="text-one fw-bolder m-0">
											ویژگی های محصول
										</h4>
										@endif
										<ul class="m-0 px-3 py-1">
											@foreach($top_properties as $top_prop)
											@if(strlen($top_prop->description) > 2)
											<li class="text-one py-1">
												<p class="m-0 text-dark">
													{!! $top_prop->description !!}
												</p>
											</li>
											@endif
											@endforeach
										</ul>
									</div>
											@if($product->colors->count() != 0)
											<div class="d-md-block d-sm-none d-xs-none">
												@include('site.products.contents.colors')
											</div>
											@endif
												<div class="d-md-none d-sm-block d-xs-block price">
											<div class="price-box px-0 pt-2 pb-0">
												@include('site.products.contents.select')
											</div>
										</div>
							
								</div>
							

								<div class="col-xl-3 col-lg-4 col-sm-12 text-start p-2">
								
									<a href="{{route('site.brand.detail',['id'=>@$product->brands->id])}}" class="border d-flex p-2">
										<img src=""
											alt="{{@$product->brands->title}}" class="w-100 text-center text-secondary">
									</a>

									<div class="bg-light rounded-custom h-100 d-flex  justify-content-center p-3">
										<div class="">
									
										<div class="d-md-block d-sm-none d-xs-none">
										<p class="my-2 me-2">
													<span class="ismb h3 text-success">
													@{{ selectedPrice }}
													</span>
													<small></small>
												</p>
												<div>
												<del class="h4 my-2 me-2" 
												v-if="selectedRealPrice !== '0 تومان ' && selectedRealPrice !== 'NaN تومان '">
												@{{ selectedRealPrice }}
												</del>
												</div>
											</div>
											  <ul class="p-2 my-0 mx-auto w-100">
												<li class="list-unstyled d-flex align-items-center">
													<i class="bi bi-patch-check d-flex me-1 text-success"></i>
													برند {{@$product->brands->title}}
												</li>
												<li class="list-unstyled d-flex align-items-center">
													<i class="bi bi-patch-check d-flex me-1 text-success"></i>
													ضمانت اصالت کالا

												</li>
												<li class="list-unstyled d-flex align-items-center">
													<i class="bi bi-patch-check d-flex me-1 text-success"></i>
													ارسال سریع

												</li>
												<li class="list-unstyled d-flex align-items-center">
													<i class="bi bi-patch-check d-flex me-1 text-success"></i>
													تضمین سلامت فیزیکی
												</li>
											</ul>
										
											<br>
																							<script>
													$(document).ready(function() {
														$('.count').prop('disabled', true);
														$(document).on('click', '.plus', function() {
															$('.count').val(parseInt($('.count').val()) + 1);
														});
														$(document).on('click', '.minus', function() {
															$('.count').val(parseInt($('.count').val()) - 1);
															if ($('.count').val() == 0) {
																$('.count').val(1);
															}
														});
													});
												</script>
																							@if($product->stock_count !== 0)
																								
																						<div class="input-number-box w-30 ps-1">
															<div class="qty d-flex align-items-center rounded-0 border">
																<span class="minus rounded-0 text-dark  h-100">
																	<i class="bi bi-dash"></i>
																</span>
																<input type="number" class="count form-control rounded-0 text-center mx-auto" id="quantity"
																	name="quantity" v-model="quantity" min="1">
																<span class="plus rounded-0 text-dark h-100">
																	<i class="bi bi-plus"></i>
																</span>
															</div>
														</div>
											
											<div class="mt-3">
												
												   <button type="button"
															class="btn btn-optic w-100  d-flex align-items-center justify-content-center"
															  @click="addToCart({{$product->id}},quantity,true,selectedColor)">
														<i class="bi bi-cart4 d-flex me-2"></i>
														افزودن به سبد خرید
													</button>
											</div>
											  @endif
										</div>
									</div>
								</div>
								
						@include('site.products.contents.other')
						</div>
						</div>
						@if($relate->count() != 0)
			@include('site.products.contents.related')
			@endif
			</div>
			</div>
		</div>
	
<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="shareModalLabel">اشتراک این محصول</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row w-100 m-0">
					<div class="col-sm col-xs p-1">
						<a href="https://t.me/share/url?url={{route('site.product.detail',['id'=>$product->id])}}"
							data-social="telegram"
							data-url="{{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">

							<i class="bi bi-telegram d-flex align-items-center justify-content-center"></i>
						</a>
					</div>
					<div class="col-sm col-xs p-1">
						<a href="whatsapp://send?text={{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">

							<i class="bi bi-whatsapp d-flex align-items-center justify-content-center"></i>
						</a>
					</div>
					<div class="col-sm col-xs p-1">
						<a href="https://www.instagram.com/?url={{route('site.product.detail',['id'=>$product->id])}}"
							rel="noopener noreferrer nofollow">
							<i class="bi bi-instagram d-flex align-items-center justify-content-center"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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