

					<!-- description -->
					<div class="col-xl-3 col-lg-4 col-md-5 p-2">
						<div class="col-sm-12 d-md-block d-sm-none d-xs-none p-1">
							<div class="figure w-100 mb-4">
								<div class="card rounded-0 border-0 p-1 ">
									<img src="{{$brand->brand_image}}" alt="{{@$brand->title}}" class="text-secondary">
								</div>
							</div>
						</div>
							<div class="col-sm-12 p-0 d-md-block d-sm-none d-xs-none">
								@include('site.brand.content.filter')
							</div>
					</div>
					
					<div class="col-xl-9 col-lg-8 col-md-7 p-0">
						<div class="col-sm-12 p-1">
							<div class="card rounded-0 border-0 p-3 ">
								<h1 class="ismb text-one h2 mt-2 mb-0">
									{{@$brand->title}}
								</h1>
							</div>
						</div>
						@if(@$brand->description != null)
							<div class="col-sm-12 p-1">
								<div class="card rounded-0 border-0 p-3 figure-sc ">
									<div class="text-justifydesc" style="height: 12rem; overflow-y: scroll;">
										{!! @$brand->description !!}
									</div>
								</div>
							</div>
						@endif
						<div class="products p-0">
							<div class="row w-100 m-0">
							
							
									<!-- Modal -->
					<div class="modal fade" id="filterbrsModal" tabindex="-1" aria-labelledby="filterbrsModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-fullscreen">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="filterbrsModalLabel">Modal title</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body bg-light">
									<div class="row w-100 m-0 filter-top">
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch1">
														کالاهای موجود
													</label>
													<input class="form-check-input m-0" type="checkbox"
														id="Switch1" @change="filterBrands()"
														v-model="available">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														پرفروشترین
													</label>
													<input class="form-check-input m-0" value="most"
														type="radio" name="Switch4" id="Switch4"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														ارزانترین
													</label>
													<input class="form-check-input m-0" value="cheapest"
														type="radio" name="Switch4" id="Switch5"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														گرانترین
													</label>
													<input class="form-check-input m-0" value="expensive"
														type="radio" name="Switch4" id="Switch6"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
										<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
											<div class="card border-0 rounded-0">
												<div
													class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
													<label class="form-check-label fw-bolder"
														for="Switch4">
														محبوبترین
													</label>
													<input class="form-check-input m-0" value="like"
														type="radio" name="Switch4" id="Switch7"
														@change="filterBrands()" v-model="sortBy">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 d-md-block d-sm-none d-xs-none p-0">
					<div class="row w-100 m-0 filter-top">
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch1">
										کالاهای موجود
									</label>
									<input class="form-check-input m-0" type="checkbox" id="Switch1"
										@change="filterBrands()" v-model="available">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										پرفروشترین
									</label>
									<input class="form-check-input m-0" value="most" type="radio"
										name="Switch4" id="Switch4" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										ارزانترین
									</label>
									<input class="form-check-input m-0" value="cheapest" type="radio"
										name="Switch4" id="Switch5" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										گرانترین
									</label>
									<input class="form-check-input m-0" value="expensive" type="radio"
										name="Switch4" id="Switch6" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
						</div>
						<div class="col-xl col-lg-3 col-md-3 col-sm-6 p-1 p-list-custom">
							<div class="card border-0 rounded-0">
								<div
									class="form-check form-switch py-2 px-2 d-flex align-items-center justify-content-between">
									<label class="form-check-label fw-bolder" for="Switch4">
										محبوبترین
									</label>
									<input class="form-check-input m-0" value="like" type="radio"
										name="Switch4" id="Switch7" @change="filterBrands()" v-model="sortBy">
								</div>
							</div>
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
								<div class="row w-100 ">
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-4 col-6 p-2" v-for="(product,index) in sortedProducts">
									<div class="card">
										<a :href="product.url">
											<figure>
												<div class="figure">
													<img :data-src="product.image" :src="product.image"  />
												</div>
											</figure>

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
				