@extends('layouts.site.master')
@section('robots'){{'noindex ,nofollow' }}@stop
@section('content')

<div class="auth py-5 my-5 d-flex align-items-center justify-content-center">
	<div class="row w-100 m-0">
		<div class="col-xxl-4 col-xl-6 col-lg-7 col-md-8 col-sm-10 col-xs-12 m-auto p-1">
		  <form class="mb-0" method="post" action="{{URL::action('App\Http\Controllers\Panel\LoginController@postRegister')}} " enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input name="product_id" value="{{$product_id}}" type="hidden" />


                        @if(isset($order))
                            <input name="order" value="1" type="hidden" />
                        @endif
			<div class="card shadow border-0 rounded-0 p-3">
				<div class="row w-100 m-0">
								<div class="col-xxl-12 text-center p-1">
									<p class="ismb h2 text-a  text-success">
										ثبت نام کنید
									</p>
								</div>
								<div class="col-xxl-6 p-1">
									<div class="form-floating">
										<input type="text" class="form-control" id="floatingInput" name="name"
											placeholder="نام و نام خانوادگی">
										<label for="floatingInput">
											نام و نام خانوادگی
										</label>
									</div>
								</div>
								<div class="col-xxl-6 p-1">
									<div class="form-floating">
										<select class="form-select" id="floatingSelect"
											aria-label="Float[ing label select example" name="gender">
                                            <option value="" selected disabled>انتخاب کنید</option>
                                            @foreach($gender as $key=>$item)
                                                <option value="{{$key}}">{{$item}}</option>
                                            @endforeach
										</select>
										<label for="floatingSelect">جنسیت</label>
									</div>
								</div>
								<div class="col-xxl-6 p-1">
									<div class="form-floating">
										<input type="tel" name="mobile" class="form-control" id="floatingInput"
											placeholder="شماره همراه">
										<label for="floatingInput">
											شماره همراه
										</label>
									</div>
								</div>
								<div class="col-xxl-6 p-1">
									<div class="form-floating">
										<input type="email" name="email" class="form-control" id="floatingInput"
											placeholder="ایمیل">
										<label for="floatingInput">
											ایمیل
										</label>
									</div>
								</div>
{{--								<div class="col-xxl-6 p-1">--}}
{{--									<div class="form-floating">--}}
{{--										<input type="password" class="form-control" id="floatingInput"--}}
{{--											placeholder="رمز عبور">--}}
{{--										<label for="floatingInput">--}}
{{--											رمز عبور--}}
{{--										</label>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--								<div class="col-xxl-6 p-1">--}}
{{--									<div class="form-floating">--}}
{{--										<input type="password" class="form-control" id="floatingInput"--}}
{{--											placeholder="تکرار رمز عبور">--}}
{{--										<label for="floatingInput">--}}
{{--											تکرار رمز عبور--}}
{{--										</label>--}}
{{--									</div>--}}
{{--								</div>--}}
								<div class="col-sm-12 p-1">
									<button type="submit" class="btn btn-success rounded-custom w-100">
										ثبت نام کنید
									</button>
								</div>
								<div class="col-sm-12 text-center p-1">
									<p class="py-2 text-secondary rounded-custom w-100">
										اگر قبلا ثبت نام کرده اید، <a href="{{ route('panel.log') }}" class="text-a fw-bolder">وارد</a>
										شوید
									</p>
								</div>
							</div>
						
		</div>
	</form>
	</div>
	</div>
</div>

    <script type="text/javascript">
        $(document).ready(function () {
        $(".input_id").keypress(function (event) {
            var ew = event.which;
            // alert(ew);
            if (48 <= ew && ew <= 57)
                return false;
            if (65 <= ew && ew <= 90)
                return false;
            if (97 <= ew && ew <= 122)
                return false;
            if (8 == ew || ew == 64 || ew == 46)

                return false;


            return true;

        });
    });

</script>
@stop
@section('js')

<script id="rendered-js">
	$(document).ready(function () {
		$(".example1").pDatepicker({
			initialValueType: "gregorian",
			format: "YYYY/MM/DD",
			onSelect: "year"
		});

	});
</script>


@stop
