@extends('layouts.site.master')
@section('content')
<form action="{{route('site.cart.post-checkout')}}" method="POST">
			{{ csrf_field() }}
<div class="cart">
			<div class="bg-b-light py-3">
				<div class="container">
					<div class="row w-100 m-0">
						<div class="col-sm-12 p-1 px-xs-2">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">
											خانه
										</a></li>
									<li aria-current="page" class="breadcrumb-item active">
										سبد خرید
									</li>
								</ol>
							</nav>
						</div>
						<div class="col-lg-9 p-0">
							<div class="row w-100 m-0">
								<div class="col-xxl-12 px-1">
									<div role="alert"
										class="alert alert-danger alert-dismissible rounded-custom my-1 fade show">
											{{@$setting_header->alert}}
										<button type="button" data-bs-dismiss="alert" aria-label="Close"
											class="btn-close"></button>
									</div>
								</div>
							@include('site.cart.contents.cont')
						</div>
						</div>
						</form>	
						@include('site.cart.contents.sidebar')
					</div>
				</div>
			</div>
		</div>


	@if($addresses != null)
	@foreach($addresses as $row)
	<!-- Modal -->
	<div class="modal fade" id="adressModal{{$row->id}}" tabindex="-1" aria-labelledby="adressModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="adressModalLabel">
						اضافه کردن آدرس
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="m-0" method="post"
						action="{{URL::action('App\Http\Controllers\Panel\PanelController@postEditAddress',$row->id)}}"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row w-100 m-0">
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_name"
										value="{{$row->transferee_name}}" placeholder="نام گیرنده" />
									<label for="floatingSelect">
										نام گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_family"
										value="{{$row->transferee_family}}"
										placeholder="نام خانوادگی گیرنده" />
									<label for="floatingSelect">
										نام خانوادگی گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="transferee_mobile"
										value="{{$row->transferee_mobile}}" placeholder="شماره گیرنده" />
									<label for="floatingSelect">
										شماره گیرنده<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<input type="text" class="form-control" name="name" value="{{$row->name}}"
										placeholder="نام آدرس" />
									<label for="floatingSelect">
										نام آدرس<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<select name="state_id" class="form-select" id="floatingSelect" required
										aria-label="Floating label select example"
										v-model="selectedState{{$row->id}}"
										@change="getEditCities(selectedState{{$row->id}})">
										<option value=""> انتخاب استان </option>
										@foreach($states as $state)
										<option value="{{$state->id}}">{{$state->name}}</option>
										@endforeach
									</select>
									<label for="floatingSelect">
										استان<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-lg-4 p-1">
								<div class="form-floating">
									<select class="form-select" id="floatingSelect"
										aria-label="Floating label select example" required
										v-model="selectedCity{{$row->id}}" name="city_id">
										<option value="">انتخاب شهر </option>
										<option v-for="city in cities" :value="city.id">@{{city.name}}
										</option>
									</select>
									<label for="floatingSelect">
										شهر<span class="text-danger">*</span>
									</label>
								</div>
							</div>

							<div class="col-sm-8 p-1">
								<div class="form-floating">
									<textarea class="form-control" placeholder="ادامه آدرس
مثال:محله-خیابان اصلی-خیابان فرعی-کوچه-پلاک -طبقه"
										id="floatingTextarea" id="location" name="location" required
										style="height:auto !important">{{$row->location}}</textarea>
									<label for="floatingTextarea">نشانی پستی
<br>
ادامه آدرس
مثال:محله-خیابان اصلی-خیابان فرعی-کوچه-پلاک -طبقه<span class="text-danger">*</span></label>

								</div>
							</div>
							<div class="col-sm-4  p-1">
								<div class="form-floating">
									<input type="text" class="form-control" id="floatingPassword"
										name="postal_code" value="{{$row->postal_code}}"
										placeholder="کد پستی">
									<label for="floatingPassword">
										کد پستی
									</label>
								</div>
								<small>
									کد پستی باید ۱۰ رقم و بدون خط تیره باشد
								</small>
							</div>
							<div class="col-sm-12 text-end p-1">
								<button type="submit" class="btn btn-success">
									تایید و ثبت ارسال
								</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	@endforeach
	@endif

@stop
