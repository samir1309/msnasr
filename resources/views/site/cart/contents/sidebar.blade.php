<div class="col-lg-3 p-0">
							<div class="row w-100 m-0">
								<div class="col-sm-12 p-1">
									<div class="card border-0 bg-light rounded-custom p-2">
										<div class="p-1">
										
										
										  @include('site.cart.contents.addresses')
										  
										  
											<hr class="my-2">
											
 @if(\Illuminate\Support\Facades\Auth::check())
    @if(@$currentOrder->address_id !== null)
        <div class="card p-3 border-0 rounded-0 mb-2" v-if ="order.city_id !== 246">
            <select v-model="changePost1" class="form-select" aria-label="انتخاب روش ارسال"  required  oninvalid='swal("", "انتخاب نوع روش ارسال اجباری است", "error")'>
                <option value="" selected>
                    انتخاب روش ارسال
                </option>
                <option value="1|20000|20,000 تومان" >
                    پیشتاز
                </option>
            </select>
          
        </div>


        <div class="card p-3 border-0 rounded-0 mb-2" v-else>
            <select  v-model="changePost1" class="form-select" name="post_type" aria-label="انتخاب روش ارسال" required  oninvalid='swal("", "انتخاب نوع روش ارسال اجباری است", "error")'>
                <option value="" selected>
                    انتخاب روش ارسال

                </option>

                <option    v-if ="cartPayment > 1000000" selected  value="4|0|0" >
                    پیک
                </option>

            </select>
        </div>
        
		<input name="post_type" type="hidden" :value="changePost2" />

    @endif
    @endif
									</div>
									</div>
								</div>
								<div class="col-sm-12 p-1">
									<div class="card border-0 bg-light rounded-custom p-2">
												آیا کد تخفیف دارید؟
											</label>
											<div class="position-relative">
												<input name="code" v-model="discountCode" placeholder="کد تخفیف  خود را وارد کنید...."  class="form-control text-start rounded-custom overflow-hidden"> 
												<button  @click="addDiscount" type="button" class="btn btn-success position-absolute top-0 bottom-0 end-0 rounded-custom">
													<i class="bi bi-check2-circle d-flex"></i>
												</button>
											</div>
									
									</div>
								</div>
								<div class="col-sm-12 p-1">
									<div class="card border-0 bg-light rounded-custom p-2">
										<div class="row w-100 m-0">
											<div
												class="col-xl-6 col-lg-12 col-sm-6 col-xs-6 text-start px-1 py-2">
												<p class="my-0 text-secondary">
													محصولات(@{{ cartTotal }})
											</div>
											<div class="col-xl-6 col-lg-12 col-sm-6 col-xs-6 text-end px-1 py-2">
												<p class="my-0 text-secondary">
														@{{ cartSumPrice }} تومان
												</p>
											</div>
										</div>
											<div class="row w-100 m-0">
											   <div class="m-0 d-flex align-items-center justify-content-between text-secondary">
													<div class="d-flex align-items-center">
														<i class="bi bi-truck d-flex me-2"></i>
														هزینه ارسال
													</div>
													<span>
													@{{ selectedPost }}
													</span>
													<input type="hidden" name="post_price" :value="selectedPost2">

												</div>
										</div>
										
										<!--<div class="row w-100 m-0">
											<div
												class="col-xl-6 col-lg-12 col-sm-6 col-xs-6 text-start px-1 py-2">
												<p class="my-0 text-secondary">
													تخفیف کالاها
												</p>
											</div>
											<div
												class="col-xl-6 col-lg-12 col-sm-6 col-xs-6 text-end px-1 py-2">
												<p class="my-0 text-danger">
													(۳٪) ۱۰۰،۰۰۰ تومان
												</p>
											</div>
										</div>-->
										
										<hr class="my-1">
										<div class="row w-100 m-0">
											<div
												class="col-xl-6 col-lg-6 col-sm-6 col-xs-6 text-start px-1 py-2">
												<p class="my-0 text-dark ismb">
													جمع سبد خرید
												</p>
											</div>
											<div class="col-xl-6 col-lg-6 col-sm-6 col-xs-6 text-end px-1 py-2">
												<p class="my-0 text-dark ismb">
												    @{{ cartPayment + selectedPost2 }} تومان
												</p>
											</div>
										</div>
										<div class="col-xxl-12 px-1 py-2">
											<button type="submit"
												class="btn btn-optic rounded-custom w-100">
												ادامه فرایند خرید
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					