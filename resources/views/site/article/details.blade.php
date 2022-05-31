@extends('layouts.site.master')
@section('content')
@include('sweet::alert')
<main class="content">
		<div class="blog blog-details pb-5 pt-3">
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
								<li class="breadcrumb-item">
									<a href="{{url('/article-category')}}">
										لیست مقالات
									</a>
								</li>
								<li class="breadcrumb-item">
										<a href="{{url('/article-list',['id'=>$blog->cat->id])}}">
											{{@$blog->cat->title}}
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{{@$blog->title}}
									</li>
							</ol>
						</nav>
					</div>
					<div class="col-xl-9 col-12 col-lg-8 p-md-3 p-sm-1 p-0">
				
					@include('site.article.content.info')
					
						<div class="share border-bottom py-2">
							<div class="row w-100 m-0">
							@include('site.article.content.social')
								<div class="col-md px-1 py-md-0 py-2">
									<ul class="p-0 m-0 d-flex align-items-center justify-content-end">
										<li class="list-unstyled ms-xl-3 ms-sm-3">
											<p class="h6 m-0 d-flex text-secondary">
											{{$blog->view }}
												<i class="bi bi-eye-fill d-flex ms-1"></i>
											</p>
										</li>
										<li class="list-unstyled ms-xl-3 ms-sm-3">
											<p class="h6 m-0 d-flex text-secondary">
											{{$comments_count}}
												<i class="bi bi-chat-fill d-flex ms-1"></i>
											</p>
										</li>
									
									</ul>
								</div>
							</div>
						</div>
				

				<div class="comments py-4">
				@include('site.article.content.comments')
						</div>
					</div>
					@include('site.article.content.related')
			</div>
			</div>
		</div>
	</main>
	
	

@stop