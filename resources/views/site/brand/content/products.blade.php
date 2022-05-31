<div class="col-xl-9 col-lg-8 col-md-7 p-0">
						<div class="products p-0">
							<div class="row w-100 m-0">
							
							
								<div class="col-12 p-2">
									<div class="bg-light viewby p-2">
								
										 <ul class="p-0 m-0 d-flex align-content-center">
											<li class="list-unstyled">
												<select class="form-select rounded-pill bg-transparent"
													aria-label="">
													<option selected>
														مشاهده بر اساس :
													</option>
													
													<option id="Switch1" @change="filterProducts()" v-model = "available">
														پرفروش ترین
													</option>
													<option value="cheapest" @change="filterProducts()" v-model = "sortBy">
														ارزان ترین
													</option>
													<option value="3">
														گران ترین
													</option>
													<option value="4">
														کالاهای موجود
													</option>
													<option value="5">
														محبوب ترین
													</option>
												</select>
											</li>
										</ul> 
									</div>
								</div>
							
								<template v-if="loading2">
									<div class="d-flex justify-content-center py-5 my-5">
										<div class="spinner-border" role="status">
											<span class="visually-hidden">Loading...</span>
										</div>
									</div>
								</template>
								<template v-if="loading2 === false">
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-4 col-6 p-2" v-for="(product,index) in sortedProducts">
									<div class="card">
										<a :href="product.url">
											<figure>
												<div class="figure">
													<img :data-src="product.image" :src="product.image"  />
												</div>
											</figure>

											<div class="star-ratings-sprit mx-auto my-3">
												<span class="star-ratings-sprit-rating"
													style="width: 70%;"></span>
											</div>
											<div class="name">
												<p class="name1 text-dark">
												@{{ product.title }}
												</p>
												<p class="name2">
												</p>

											</div>
			<div class="price">
				
				<div class="old text-secondary"  v-if="product.old_price !== '0 تومان ' && product.stock !== 0" >
					<del>
					@{{ product.old_price }}
					</del>
				</div>
				<div class="off">
						<span class="badge bg-one text-dark fw-bolder" v-if="product.calcute > 0 && product.stock !== 0" >
						@{{ product.calcute }}%
						</span>
					</div>
				</div>
					<p class="prc fw-bolder text-center"  v-if="product.stock == 0" >
						ناموجود
					</p>
				
					<p class="prc fw-bolder text-dark text-center font-weight-bold  " v-else >
					@{{ product.price }}
					</p>
		
										</a>
									</div>
								
								</div>
			
					
								</template>

						<template v-if="countProduct > sortedProducts.length ">
							<div class="d-flex justify-content-center py-5 my-5">
								<div class="spinner-border" role="status">
									<span class="visually-hidden">Loading...</span>
								</div>
							</div>
						</template>
						</div>
						</div>
				
				</div>
				