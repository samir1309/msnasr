@extends('layouts.site.master')

@section('content')


<main class="content">
		<div class="blog blog-list pb-5 pt-3">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-12 px-2 py-md-4 py-1">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb p-0 m-0">
								<li class="breadcrumb-item">
										<a href="/">
											<i class="bi bi-house"></i>
											خانه
										</a>
									</li>
									<li class="breadcrumb-item">
										<a href="{{url('/article-category')}}">
											لیست مقالات
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{{@$blog_category->title}}
									</li>
							</ol>
						</nav>
					</div>
					<div class="col-sm-12 p-1">
						<h1 class="text-one my-2 ismb h2">
							لیست مقالات {{@$blog_category->title}}
						</h1>
					</div>
						@foreach($blogs as $blog)
							@php
							$comments_count =
							App\Models\Comment::where('commentable_id',$blog->id)->whereStatus(1)->where('commentable_type','App\Models\Content')->count();
							@endphp
					<div class="col-lg-3 col-sm-6 p-2">
						<a href="{{url('/article-details',['id'=>$blog->id])}}">
					
							<div class="card p-0">
								
								<img class="imgblog" @if(file_exists('assets/uploads/content/art/big/'.$blog->image)) src="{{asset('assets/uploads/content/art/big/'.$blog->image)}}" alt="{{@$blog->title}}" @else src="{{asset('assets/site/images/notfound.png')}}" @endif style="display: inline-block;width: auto;height: auto;max-height: 100%;max-width: 100%;"/>

								<div class="cont">
									<p class="ismb title">
									{{@$blog->title}}
									</p>
									<div class="items">
										<ul class="p-0 m-0">
											<li class="list-unstyled">
												<p class="cat">
													{{@$blog_category->title}}
												</p>
											</li>
											<li class="list-unstyled">
												<p class="date">
													{{ jdate('Y/m/d',$blog->created_at->timestamp) }}
												</p>
											</li>
											<li class="list-unstyled">
												<p class="review">
													{{$blog->view}} بازدید
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
	</main>
	
@stop
