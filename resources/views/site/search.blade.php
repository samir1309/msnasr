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
								<li class="breadcrumb-item active" aria-current="page">
								جستجوی {{$search}}
								</li>
							</ol>
						</nav>
					</div>
				
					<div class="col-xl-12 col-lg-12 col-md-12 p-0">
						<div class="products p-0">
							<div class="row w-100 m-0">
							@if($search_products != null)
								@foreach($search_products as $product)
								<div class="col-xl-3 col-lg-4 col-md-6 col-sm-4 col-6 p-2">
								
									@include('layouts.site.blocks.product-box',['item' => $product])
								</div>
								@endforeach
								@endif
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	


					@stop