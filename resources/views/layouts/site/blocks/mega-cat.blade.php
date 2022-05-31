										<li class="nav-item mega-item">
										
											<a class="nav-link" href="#">
										دسته بندی محصولات
											</a>
										
											<div class="mega-box border-top">
												<div class="row w-100 m-0">
										
													<div class=" col-lg-9 col-xxl-3 p-1">
													@foreach($category_footer as $key=>$main)
													
														<a href="{{route('site.product.list',['id'=>$main->id])}}" class="ismb text-optica p-1">
															<i class="bi bi-caret-left-fill"></i>
														{{@$main->title}}
														</a>
														<ul class="p-0 m-0">
														@foreach($main->childs as $key=>$child)
														@if(count($child->childs) > 0)
						@foreach($child->childs->chunk(6)->take(4) as $item=>$cats)
					  @if(!$item)
															<li class="list-unstyled p-1">
																<a href="{{route('site.product.list',['id'=>$child->id])}}" class="text-secondary">

																	{{@$child->title}}
																</a>
															</li>
															 @endif
								@foreach($cats as $cat)
									<li class="list-unstyled p-1">
																<a href="{{route('site.product.list',['id'=>$cat->id])}}" class="text-secondary">

																	{{@$child->title}}
																</a>
															</li>
															@endforeach
												@endforeach
														</ul>
											
												</div>
											
												@else
													
												<div class="col-lg-9 col-xxl-3 p-1">
												
													
														
														<ul class="p-0 m-0">
											
															<li class="list-unstyled p-1">
																<a href="{{route('site.product.list',['id'=>$child->id])}}" class="text-secondary">
																{{@$child->title}}
																</a>
															</li>
														</ul>
												</div>
												
													@endif
												@endforeach
											
										</div>
											@endforeach
											<div class="col-lg-3 img-mega p-1">
													<a href="#">
													<img src="{{asset('assets/site/images/6.webp')}}" width="100%" height="100%" />
									
													</a>
												</div>
											</div>
										</li>
											