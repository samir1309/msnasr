@extends('layouts.site.master')
@section('content')


<div class="pro pro-list pb-5 pt-3">
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
										<a href="{{route('site.brand.list')}}">
											همه برند ها
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{!! @$brand->title !!}
									</li>
							</ol>
						</nav>
					</div>
					@include('site.brand.content.info')
				</div>
			</div>
		</div>
	


@endsection
