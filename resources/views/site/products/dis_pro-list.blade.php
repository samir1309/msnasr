@extends('layouts.site.master')
@section('content')

<main class="content bg-two">
	<div class="py-lg-4 py-md-3 py-sm-2 py-xs-2">
		<div class="product product-list">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="card card-mobile border-0 rounded-0 py-2 px-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item">
										<a href="/">
											<i class="bi bi-house"></i>
											خانه
										</a>
									</li>
                                    @php
                                    $seg = request()->segments();
                                    @endphp
                                    @if($seg[0] == 'popular')
									<li class="breadcrumb-item active" aria-current="page">
									محبوبترین ها
									</li>
                                    @elseif($seg[0] == 'latest')
                                        <li class="breadcrumb-item active" aria-current="page">
                                         جدیدترین ها
                                        </li>
                                        @elseif($seg[0] == 'discount')
                                        <li class="breadcrumb-item active" aria-current="page">
                                            تخفیف دار ها
                                        </li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">
                                            پرفروش ترین ها
                                        </li>
                                    @endif
								</ol>
							</nav>
						</div>
					</div>
					

		<div class="col-xl-12 col-lg-12 col-md-12 p-0">
						<div class="products p-0">
							<div class="row w-100 m-0">
							@if($most_products  != null)
								@foreach($most_products  as $product)
								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-4 col-6 p-2">
								
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
	</div>
</main>


@stop
