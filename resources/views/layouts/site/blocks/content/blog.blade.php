<div class="blog pt-3 pb-5">
			<div class="container">
				<div class="col-xxl-8 col-xl-9 col-lg-10 col-12 mx-auto px-0 pb-3">
				<div class="title-bar">
						<hr class="">
						<div class="titletext">
							<p class="h4 ismb text-dark ">
							مقالات عینک پارسیا
								</p>
						</div>
					</div>
				</div>
				
				<div class="row w-100 m-0">
				@foreach($articles as $blog)
					<div class="col-lg-3 col-sm-6 p-2">
						<a href="{{url('/article-details',['id'=>$blog->id])}}">
							<div class="card p-0">

								<div class="imgblog">
								<img src="{{asset('assets/uploads/content/art/medium/'.$blog->image)}}" width="100%" height="100%" />
												
								</div>
								<div class="cont">
								
									<p class="ismb title">
									{!! @$blog->title !!}
									</p>
									<div class="items">
										<ul class="p-0 m-0">
											<li class="list-unstyled">
												<p class="date">
												{{ jdate('Y/m/d',$blog->created_at->timestamp) }}
												</p>
											</li>
											<li class="list-unstyled">
												<p class="review">
												بازدید 	{{$blog->view}}
												</p>
											</li>
										</ul>
									</div>
									<div class="caption">
									{!! strip_tags(\Illuminate\Support\Str::words($blog->description,30)) !!}
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
				</div>
			</div>
		</div>
	