@extends('layouts.site.master')

@section('content')
<div class="aboutus pb-5 pt-3">
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
									تماس باما
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-12 p-2">
						<h1 class="ismb text-optica">
							تماس با عینک پارسیا
						</h1>
					</div>
					<div class="col-md-6 p-2">
						<div class="bg-light h-100 p-4 rounded-custom">
							<h4 class="h5 px-2">
								فرم ارتباط با عینک پارسیا
							</h4>
							<form action="{{URL::action('App\Http\Controllers\Site\HomeController@postContact')}}" method="POST" class="m-0">
                                {{csrf_field()}}
								<div class="col-12 p-2">
									<input type="text" name="name" id="" class="form-control form-control-lg border-0 rounded-custom" placeholder="نام و نام خانوادگی">
								</div>
								<div class="col-12 p-2">
									<input type="text" name="subject" id="" class="form-control form-control-lg border-0 rounded-custom" placeholder="موضوع پیام">
								</div>
								<div class="col-12 p-2">
									<input type="tel" name="phone" id="" class="form-control form-control-lg border-0 rounded-custom text-start" placeholder="شماره همراه">
								</div>
								<div class="col-12 p-2">
									<textarea name="message" id="" cols="30" rows="3" class="form-control form-control-lg border-0 rounded-custom" placeholder="متن پیام شما"></textarea>
								</div>
								<div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12 ms-auto p-2">
									<button type="submit" class="btn btn-optic w-100 rounded-custom">
										ارسال پیام
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-6 p-2">
						<div class="bg-light h-100 p-4 rounded-custom">
							<h4 class="h5 px-2">
								راه های ارتباط با پارسیا
							</h4>
							<div class="col-12 p-2">
								<div class="alert alert-danger alert-dismissible m-0 fade show rounded-custom" role="alert">
									برای پیشگری از شیوع ویروس کرونا تا اطلاع بعدی فروش حضوری تعطیل می باشد.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>

							<?php $setting_header = App\Models\Setting::first(); 
								  $social_header = App\Models\Social::first(); 
							
							?>



							<div class="col-12 p-2">
								<a href="tel: {{@$setting_header->contact}}" class="text-dark">
									<i class="bi bi-telephone text-optica"></i>
									تماس با پشتیبانی : {{@$setting_header->contact}}
								</a>
							</div>
							<div class="col-12 p-2">
								<a href="mailto:" class="text-dark">
									<i class="bi bi-envelope text-optica"></i>
									ایمیل پشتیبانی : {{@$setting_header->email}}
								</a>
							</div>
							<div class="col-12 p-2">
								<a href="#" class="text-dark">
									<i class="bi bi-pin-map-fill text-optica"></i>
									آدرس فروشگاه مرکزی :  {{@$setting_header->address}}
								</a>
							</div>
							<div class="col-12 p-2">
							در صورت عدم پاسخگویی از طریق دایرکت
												<a href="{{@$instagram->address}}" class="text-one" rel="noopener noreferrer nofollow">
													اینستاگرام کاج
												</a>
												و یا از طریق
												<a href="{{@$whatsapp->address}}" class="text-one" rel="noopener noreferrer nofollow">
													واتس اپ کاج
												</a>
												به شماره
												<a href="tel:{{@$setting_header->phone}}" class="text-one">
                                                    {{@$setting_header->phone}}
												</a>
												پیام ارسال نمایید.
							</div>
							<div class="col-12 p-2">
								<a href="#" class="text-dark">
									فروشگاه پارسیا اپتیک با 18 سال سابقه درخشان در زمینه فروش عینک های طبی و آفتابی آماده خدمت به شما مشتریان گرامی می باشد
								</a>
							</div>
							<div class="col-12 p-2">
								<ul class="p-0 m-0 socialmedia">
							

									@foreach($social_header as $social)
												<li class="list-unstyled float-start p-1 me-2">
													<a href="{{@$social->address}}" class="" rel="noopener noreferrer nofollow">
														<i class="{{@$social->icon}}"></i>
													</a>
												</li>
                                                @endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="col-12 p-2">
						<div class="bg-light p-4 rounded-custom">
						
						<iframe src="https://goo.gl/maps/m3ga9PEqU6FQL3c1A" style="border:0" allowfullscreen="" width="100%" height="350" frameborder="0">
							</iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		@stop