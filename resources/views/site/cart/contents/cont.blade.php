							<div class="row w-100 m-0" v-if="cartItems.length > 0">
								<div class="col-xxl-12 p-1"  v-for="cartItem in cartItems" >
									<div class="card bg-light border-0 rounded-custom p-2">
									<a @click="removeCart(cartItem.productId)" class="btn btn-link btn-trash float-left 
									m-0 d-flex align-items-center ms-auto btn btn-outline-danger rounded-custom max-content">
										<i class="bi bi-trash"></i>
										حذف از سبد خرید
									</a>
									<div class="row w-100 m-0">
								
											<div class="col-lg-3 col-sm-4 col-xs-5 align-self-center p-1">
												<a :href="cartItem.productUrl" >
													<figure>
														<div class="figure-inn">
															<img  :src="cartItem.productImage" :alt="cartItem.productTitle" >
														</div>
													</figure>
												</a>
											</div>
											
											<div class="col-lg-9 col-sm-8 align-self-center p-1">
												<ul class="p-0 m-0">
													<li class="list-unstyled py-1">
														<p class="ismb text-dark h5 my-1">
												
														</p>
													</li>
													<li class="list-unstyled py-1">
														<p class="ismb text-secondary h6 my-1"><i
																class="bi bi-shield-check"></i>
																@{{ cartItem.productTitle }}
														</p>
													</li>
														<li class="list-unstyled py-1">
														<p class="ismb text-secondary h6 my-1"><i
																class="bi bi-shield-check"></i>
																@{{ cartItem.productTitleEn }}
														</p>
													</li>
													<li class="list-unstyled py-1">
														<p class="ismb text-secondary h6 my-1">
															<i class="bi bi-tag"></i> 
															<span class="me-3">
															قیمت : @{{ cartItem.itemPrice }} تومان
															</span> 
														</p>
													</li>
													<li class="list-unstyled">
															<p class="m-0 d-flex align-items-center text-secondary">
																<i class="bi bi-shield-check d-flex me-2"></i>
																گارانتی اصالت و سلامت فیزیکی کالا
															</p>
														</li>
													<li class="list-unstyled py-1">
													<div class="input-number-box col-xxl-9 col-xl-10 col-lg-11 col-md-12 col-sm-10 px-0 pt-3">
							<div class="row qty w-100 m-0 rounded-0">
								<div class="col-sm-2 col-xs-2 p-0 rounded-0">
									<span @click="minusQnty(cartItem.id)" class="d-flex align-items-center justify-content-center rounded-0 text-dark h-100" style="cursor: pointer;">
										<i class="bi bi-dash h3 d-flex m-0"></i>
									</span>
								</div>
								<div class="col-sm-4 col-xs-4 p-0 rounded-0">
									<input type="number" class="count form-control rounded-0 text-center mx-auto"
									id="quantity" name="quantity" v-model="cartItem.productQuantity" min="1" />
								</div>
								<div class="col-sm-2 col-xs-2 p-0 rounded-0">
									<span @click="plusQnty(cartItem.id)" class="d-flex align-items-center justify-content-center rounded-0 text-dark h-100" style="cursor: pointer;">
									<i class="bi bi-plus h3 d-flex m-0"></i>
								</span>
								</div>
								<div class="col-sm-4 col-xs-4 p-0 rounded-0">
									<button v-if="specificationId !== null"
										@click="addToCart(cartItem.productId,cartItem.productQuantity,false,cartItem.specificationId)"
										type="button" class="h-100 btn btn-sm btn-shop w-100 rounded-0" style="background-color: #f4b19f;
								border: 1px solid #f4b19f;
								transition: .5s ease-in-out;">
										اعمال
									</button>
									<button v-else
										@click="addToCart(cartItem.productId,cartItem.productQuantity,false,cartItem.specificationId)"
										type="button" class="h-100 btn btn-sm btn-shop w-100 rounded-0">
										اعمال
									</button>
								</div>
							</div>
						</div>
			
													</li>
													
												</ul>
											</div>
						</div>
										</div>
									</div>
							
							<div class="row w-100 m-0 py-5" v-else>
								@include('site.panel.content.empty')
							</div>
							</div>
								<script>
$(document).ready(function() {
	$('.count').prop('disabled', true);
	$(document).on('click', '.plus', function() {
		$('.count').val(parseInt($('.count').val()) + 1);
	});
	$(document).on('click', '.minus', function() {
		$('.count').val(parseInt($('.count').val()) - 1);
		if ($('.count').val() == 0) {
			$('.count').val(1);
		}
	});
});
</script>