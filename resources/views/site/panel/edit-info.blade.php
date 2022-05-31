@extends('site.panel.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="bg-one panel-head p-2">
	<h1 class="fw-bolder text-white d-flex align-items-center h4 m-0">
		<i class="bi bi-pen me-2 d-flex h2 my-0"></i>
		ویرایش اطلاعات
	</h1>
</div>
	<!-- Variable -->
	<div class="main h-100 bg-light rounded-custom p-2 dashboard d-flex align-items-center">
							<div class="col-xxl-6 mx-auto p-2">
							<form class="m-0 py-5" method="post" action="{{URL::action('App\Http\Controllers\Panel\PanelController@postEditInfo')}}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="col-sm-12 p-0">
						<div class="row w-100 m-0">
							<div class="col-sm-3 col-xs-3 align-self-end p-1">
								@php
									$image = "user";
									if(isset($user)) $image = $user->avatar;
								@endphp
								<img src="@if($image !== null && file_exists('assets/uploads/content/users/'.$image)) {!! asset('assets/uploads/content/users/'.$image) !!} @else {!! asset('assets/site/images/user.png') !!} @endif" id="blah" class="w-100 bg-two p-2 shadow-sm border">
							</div>
							<div class="col-sm-9 col-xs-9 align-self-end p-1">
								<div class="input-group">
									<label class="input-group-text" for="imgInp2">
										آپلود عکس پروفایل
									</label>
									<input type="file"name="avatar" class="form-control" id="imgInp2">
								</div>
								<!-- <label>انتخاب آواتار :</label> -->
								<!-- <input type="file" name="avatar" id="imgInp2" class="form-control"/> -->
							</div>
						</div>
					</div>
									<div class="col-12 p-1">
										<div class="form-floating">
											<input type="text" class="form-control rounded-custom"  name="name"  value="{{@$user->name}}" id="nameInput" placeholder="نام و نام خانوادگی">
											<label for="nameInput" class="text-secondary">
												نام و نام خانوادگی
											</label>
										</div>
									</div>
									<div class="col-12 p-1">
										<div class="form-floating">
											<input type="tel" class="form-control rounded-custom" value="{{@$user->mobile}}" name="mobile"  id="nameInput" placeholder="شماره همراه">
											<label for="nameInput" class="text-secondary">
												شماره همراه
											</label>
										</div>
									</div>
									<div class="col-12 p-1">
										<div class="form-floating">
											<input type="email" class="form-control rounded-custom" name="email"  value="{{@$user->email}}" id="nameInput" placeholder="ایمیل">
											<label for="nameInput" class="text-secondary">
												ایمیل
											</label>
										</div>
									</div>
									<div class="col-12 p-1">
										<button type="submit" class="btn btn-lg btn-success  rounded-custom w-100">
											ثبت اطلاعات
										</button>
									</div>
								</form>
							</div>
						</div>
						<!-- Variable -->
@stop
@section('js')
    <script>
    function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			$('#' + id).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imgInp2").change(function () {
		console.log('qdweveffer');
		readURL(this, 'blah');
	});
    </script>
@stop
