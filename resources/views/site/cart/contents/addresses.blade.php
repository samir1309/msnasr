										@if(\Illuminate\Support\Facades\Auth::check())
										<button type="button" data-bs-toggle="modal"
												data-bs-target="#addAddresModal"
												class="btn btn-optic rounded-custom w-100">
												انتخاب آدرس
											</button>
											  @else
												<a href="{{url('/panel/login?address=order')}}" class="btn btn-shop fw-bolder w-100" style="font-size: 2.5vh;">
													<i class="bi bi-geo-alt-fill me-2"></i>
													انتخاب آدرس
												</a>
											@endif
											  @if($default_address !== null)
	<div class="row w-100 m-0">
		<div class="col-xl-12 p-1">
			<div class="card bg-light rounded-0 shadow-sm p-2">
				<ul class="p-0 m-0">
					<li class="list-unstyled">
						<p class="fw-bolder">
							{{@$default_address->location}}
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-envelope"></i>
							کد پستی : {{@$default_address->postal_code}}
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-telephone"></i>
							شماره تماس : {{@$default_address->transferee_mobile}}
						</p>
					</li>
					<li class="list-unstyled">
						<p class="m-0 text-secondary">
							<i class="bi bi-person"></i>
							{{@$default_address->transferee_name.' '.@$default_address->transferee_family}}
						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
    @endif
	
	
	
									@if($addresses != null)
											<div id="addAddresModal" tabindex="-1" aria-labelledby="addAddresModalLabel" aria-hidden="true" class="modal fade">
												<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
													<div class="modal-content rounded-custom">
														<div class="modal-header">
															<h5 id="addAddresModalLabel" class="modal-title">
																وارد کردن آدرس
															</h5> 
															<button type="button"
																data-bs-dismiss="modal"
																aria-label="Close"
																class="btn-close">
															</button>
														</div>
																	<div class="modal-body p-2">
																		<div class="col-sm-12 p-1">
																			<form class="m-0" method="post" action="{{URL::action('App\Http\Controllers\Site\ShopController@postAddAddress')}}"
																					enctype="multipart/form-data">
																					{{ csrf_field() }}
																					<input type="hidden" name="order_id" :value="order.id">
																					<div class="row w-100 m-0">
																						<div class="col-lg-4 p-1">
																							<div class="form-floating">
																								<input type="text" class="form-control" required
																									oninvalid='swal("", "نام گیرنده اجباری است", "error")'
																									name="transferee_name" placeholder="نام گیرنده" />
																								<label for="floatingSelect">
																									نام و نام خانوادگی گیرنده<span class="text-danger">*</span>
																								</label>
																							</div>
																						</div>
																						
																						<div class="col-lg-4 p-1">
																							<div class="form-floating">
																								<input type="text" class="form-control" name="transferee_mobile"
																									placeholder="شماره گیرنده" required
																									oninvalid='swal("", " شماره گیرنده اجباری است", "error")' />
																								<label for="floatingSelect">
																									شماره گیرنده<span class="text-danger">*</span>
																								</label>
																							</div>
																						</div>
																						<div class="col-lg-4 p-1">
																							<div class="form-floating">
																								<input type="text" class="form-control" name="name"
																									oninvalid='swal("", "  نام ادرس اجباری است", "error")'
																									placeholder="نام آدرس" />
																								<label for="floatingSelect">
																									نام آدرس<span class="text-danger">*</span>
																								</label>
																							</div>
																						</div>
																						<div class="col-lg-4 p-1">
																							<div class="form-floating">
																								<select name="state_id" class="form-select" required
																									oninvalid='swal("", " انتخاب استان", "error")' id="floatingSelect"
																									aria-label="Floating label select example" v-model="selectedState"
																									@change="setCities(selectedState)">
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
																									oninvalid='swal("", " انتخاب شهر اجباری است", "error")'
																									v-model="selectedCity" name="city_id">
																									<option value="">انتخاب شهر </option>
																									<option v-for="city in cities" :value="city.id">@{{city.name}}
																									</option>
																								</select>
																								<label for="floatingSelect">
																									شهر<span class="text-danger">*</span>
																								</label>
																							</div>
																						</div>

																						<div class="col-sm-12 p-1">
																							<div class="form-floating">
																								<textarea class="form-control" placeholder="نشانی پستی" required
																									oninvalid='swal("", "نشانی پستی اجباری است", "error")'
																									id="floatingTextarea" id="location" name="location"
																									style="height:auto !important"></textarea>
															<label for="floatingTextarea">نشانی پستی <span class="text-danger">*</span> <br><p style="color: #9d9c9c;">ادامه آدرس مثال:محله-خیابان اصلی-خیابان فرعی-کوچه-پلاک -طبقه</p></label>

																							</div>
																						</div>
																						<div class="col-sm-12 p-1">
																							<div class="form-floating">
																								<input type="text" class="form-control" id="floatingPassword"
																									name="postal_code" placeholder="کد پستی">
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

															@include('site.cart.contents.add-addresses')
														</div>
													</div>
												</div>
											</div>
									
									@endif