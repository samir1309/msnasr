<menu class="menu">
		<!-- desktop -->
		<div class="d-lg-block d-none">
			<div class="menu-top">
				<div class="container">
					<div class="row w-100 m-0">
						<div class="col-sm-6 col-12 align-self-center p-1">
							<ul class="p-0 m-0 d-flex justify-content-md-start justify-content-center">
								<li class="list-unstyled me-4">
									<a href="/checkout">
										<i class="bi bi-cart2 justify-content-center d-flex text-white"></i>
										<div class="badge">
										@{{ cartTotal }}
										</div>
										
									</a>
								</li>
								<li class="list-unstyled me-4">
									<a @if(!\Auth::check()) href="{{route('panel.log')}}" @else
									href="{{route('panel.favorites')}}" @endif>
										<i class="bi bi-suit-heart text-white d-flex h5 m-0"></i>
									</a>
								</li>
								<li class="list-unstyled me-4">
								@if(!\Auth::check())
									<a href="/panel/login" class="text-white d-flex align-items-center h6 m-0">
										<i class="bi bi-person-circle text-white d-flex h5 my-0 me-2"></i>
										ورود / ثبت نام
									</a>
										@else
										<a href="/panel/dashboard" class="text-white d-flex align-items-center h6 m-0">
										<i class="bi bi-person-circle text-white d-flex h5 my-0 me-2"></i>
									
											
                                            {{\Auth::user()->name.' '.\Auth::user()->family}}
                                      
                                    @endif
									</a>
								</li>
							</ul>
						</div>
						@include('layouts.site.blocks.search-form')
					</div>
				</div>
			</div>
			<div class="menu-center">
				<div class="row w-100 m-0">
					<div class="col-md-1 col-sm-2 col-2 px-xxl-2 px-xl-1 px-0 py-3 mx-auto">
						<a href="/">
		<img src="{{asset('assets/uploads/content/set/'.$setting_header->logo)}}" alt="{{$setting_header->title}}" class="text-white w-100">
						</a>
					</div>
				</div>
			</div>
			<div class="menu-bottom">
				<div class="container">
					<div class="px-2">
						<div class="border-bottom border-top py-0">
							<nav class="navbar navbar-expand-lg navbar-custom">
								<div class="container-fluid">
									<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
										data-bs-target="#navbarNav" aria-controls="navbarNav"
										aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbarNav">
										<ul class="navbar-nav mx-auto">
											<li class="nav-item">
												<a class="nav-link active" aria-current="page" href="/">
													صفحه اصلی
												</a>
											</li>
									@include('layouts.site.blocks.mega-cat')
										
											<li class="nav-item">
												<a class="nav-link" href="/brand">
													برندها
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/article-category">
													بلاگ
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/discount">
												تخفیف دارها
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/rules">
													قوانین و مقررات
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/privacy">
											راهنمای ثبت سفارش
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/about-us">
													درباره ما
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/contact-us">
													تماس با ما
												</a>
											</li>
										</ul>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- desktop -->
		<!-- desktop -->
		<!-- mobile -->
		<div class="d-lg-none d-block">
			<div class="top">
				<div class="row w-100 m-0">
					<div class="col-md-3 col-sm-4 me-auto col-6 align-self-center text-start p-2">
						<span class="opennav" onclick="openNav()">
							<i class="bi bi-list d-flex"></i>
						</span>
					</div>
					<div class="col-md-3 col-sm-4 ms-auto col-6 align-self-center text-end p-2">
						<a href="/">
						<img src="{{asset('assets/uploads/content/set/'.$setting_header->logo)}}" alt="{{$setting_header->title}}" class="text-white w-50">

						</a>
					</div>
				</div>
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn border-0" onclick="closeNav()">&times;</a>
					<ul class="navbar-nav mx-auto">
											<li class="nav-item">
												<a class="nav-link active" aria-current="page" href="/">
													صفحه اصلی
												</a>
											</li>
									@include('layouts.site.blocks.mega-cat')
										
											<li class="nav-item">
												<a class="nav-link" href="/brand">
													برندها
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/article-category">
													بلاگ
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/discount">
												تخفیف دارها
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/rules">
													قوانین و مقررات
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/privacy">
											راهنمای ثبت سفارش
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/about-us">
													درباره ما
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="/contact-us">
													تماس با ما
												</a>
											</li>
										</ul>
				</div>
			</div>
			<div class="bottom">
				<form action="" class="m-0 position-relative">
					<input type="search" name="" id="" class="form-control" placeholder="جستجو..." />
					<button type="submit" class="btn position-absolute top-0 bottom-0 end-0">
						<i class="bi bi-search"></i>
					</button>
				</form>
			</div>
		</div>
		<!-- mobile -->
	</menu>
	