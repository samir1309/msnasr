<div class="gridbanner py-2">
			<div class="container">
				<!-- desktop -->
				<div class="d-lg-block ">
					<div class="row w-100 m-0">
						<div class="col-md-3 p-2">
						@if($pos1 != null)
							<a href="{{route('site.product.list',['id'=>$pos1->id])}}" >
								<div class="card card-side p-2"  style="background-image:  url( {{asset('assets/uploads/category/'.@$pos1->cover)}});">
									<div class="over ismb">
									{!!	$pos1->title !!}
									</div>
								</div>
							</a>
							@else
							<a href="{{route('site.product.list',['id'=>$pos1->id])}}" >
								<div class="card card-side p-2"  style="background-image:  url( {{asset('assets/site/images/notfound.png')}});">
									<div class="over ismb">
											{!!	$pos1->title !!}
									</div>
								</div>
							</a>
							@endif
						</div>
						<div class="col-md-6 p-0">
							<div class="row w-100 m-0">
								<div class="col-md-12 p-2">
								@if($pos2 != null)
									<a href="{{route('site.product.list',['id'=>$pos2->id])}}">
										<div class="card card-center p-2"
										style="background-image:  url( {{asset('assets/uploads/category/'.@$pos2->cover)}});">
											<div class="over ismb">
											{!!	$pos2->title !!}
											</div>
										</div>
									</a>
									@else
									<a href="">
										<div class="card card-center p-2"
										style="background-image:  url( {{asset('assets/site/images/notfound.png')}});">
											<div class="over ismb">
											{!!	$pos2->title !!}
											</div>
										</div>
									</a>
									@endif
								</div>
								<div class="col-sm-6 p-2">
								@if($pos3 != null)
								<a href="{{route('site.product.list',['id'=>$pos3->id])}}">

										<div class="card card-center p-2"
										style="background-image:  url( {{asset('assets/uploads/category/'.@$pos3->cover)}});">
											<div class="over ismb">
											{!!	$pos3->title !!}
											</div>
										</div>
									</a>
									@else
									<a href="{{route('site.product.list',['id'=>$pos3->id])}}">

										<div class="card card-center p-2"
										style="background-image:  url( {{asset('assets/site/images/notfound.png')}});">
											<div class="over ismb">
											{!!	$pos3->title !!}
											</div>
										</div>
										</a>
										@endif
								</div>
								<div class="col-sm-6 p-2">
								@if($pos4 != null)
								<a href="{{route('site.product.list',['id'=>$pos4->id])}}">
										<div class="card card-center p-2"
										style="background-image:  url( {{asset('assets/uploads/category/'.@$pos4->cover)}});">
											<div class="over ismb">
											{!!	$pos4->title !!}
											</div>
										</div>
									</a>
									@else	
									<a href="{{route('site.product.list',['id'=>$pos4->id])}}">
										<div class="card card-center p-2"
										style="background-image:  url( {{asset('assets/site/images/notfound.png')}});">
											<div class="over ismb">
											{!!	$pos4->title !!}
											</div>
										</div>
									</a>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-3 p-2">
						@if($pos4 != null)
						<a href="{{route('site.product.list',['id'=>$pos4->id])}}">
								<div class="card card-side p-2" 
								style="background-image:  url( {{asset('assets/uploads/category/'.@$pos5->cover)}});">
									<div class="over ismb">
									{!!	$pos5->title !!}
									</div>
								</div>
							</a>
							@else
							<a href="{{route('site.product.list',['id'=>$pos4->id])}}">
								<div class="card card-side p-2" 
								style="background-image:  url( {{asset('assets/site/images/notfound.png')}});">
									<div class="over ismb">
									{!!	$pos5->title !!}
									</div>
								</div>
							</a>
							@endif
						</div>
					</div>
				</div>
				<!-- desktop -->
				<!-- mobile -->
			
				<!-- mobile -->
			</div>
		</div>
		