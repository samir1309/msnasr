<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content rounded-0 bg-two">
			<div class="modal-header">
				<h5 class="modal-title" id="filterModalLabel">
					فیلتر محصولات
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-2">
				<div class="sidebar">
					<div class="accordion" id="accordionFilter">
						<div class="row w-100 m-0">
							<div class="col-sm-12 p-list-custom">
								<div class="accordion-item bg-white">
									<h2 class="accordion-header" id="heading1">
										<button class="accordion-button" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapse1"
											aria-expanded="true" aria-controls="collapse1">
											فیلتر بر اساس قیمت
										</button>
									</h2>
									<div id="collapse1" class="accordion-collapse collapse show"
										aria-labelledby="heading1" data-bs-parent="#accordionFilter">
										<div class="accordion-body">
											<div class="range-box">
												<p
													class="d-flex align-items-center justify-content-between">
													<small class="text-end">
														تومان
													</small>
													<input dir="ltr" type="text" id="amountxs"
														class="form-control border-0 p-0 text-center w-50">
													<small class="text-start">
														تومان
													</small>
												</p>
												<div id="slider-range-xs"></div>
												<div
													class="d-flex align-items-center justify-content-between pt-4">
													<button @click="filterProducts()" type="button"
														class="btn btn-success w-100" data-bs-dismiss="modal">
														اعمال فیلتر قیمت
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 p-list-custom">
								<div class="accordion-item bg-white">
									<h2 class="accordion-header" id="heading2">
										<button class="accordion-button" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapse2"
											aria-expanded="true" aria-controls="collapse2">
											فیلتر بر اساس برند ها
										</button>
									</h2>
									<div id="collapse2" class="accordion-collapse collapse show"
										aria-labelledby="heading2" data-bs-parent="#accordionFilter">
										<div class="accordion-body">
												<input v-model="searchValue"  type="search" name=""  id=""
								class="form-control mb-2" placeholder="جستجوی برند، مثلا : جاکومو"
								/>
							<div class="py-0 brd">
								<div class="form-check" v-for="item in brandSearch">
									<input class="form-check-input" type="checkbox" :value="item.id"
										@change="filterProducts()" v-model="selected3">
									<label class="form-check-label ms-1">
										@{{ item.title }}
									</label>
								</div>

							</div>
										</div>
									</div>
								</div>
							</div>
							@foreach($fields as $key=>$row)
							<div class="col-sm-12 p-list-custom">
								<div class="accordion-item bg-white">
									<h2 class="accordion-header" id="heading3{{$key}}">
										<button class="accordion-button collapsed" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapse3{{$key}}"
											aria-expanded="false" aria-controls="collapse3{{$key}}">
											{{$row->title}}
										</button>
									</h2>
									<div id="collapse3{{$key}}" class="accordion-collapse collapse"
										aria-labelledby="heading3{{$key}}" data-bs-parent="#accordionFilter">
										<div class="accordion-body">
											<div class="py-0">
												@foreach($row->children as $item)
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														value="{{$item->id}}" id="Check{{$item->id}}"
														@change="filterProducts()" v-model="selected2"
														name="Check{{$item->id}}">
													<label class="form-check-label ms-1"
														for="Check{{$item->id}}">
														{{$item->title}}
													</label>
												</div>
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-bs-dismiss="modal">
					اعمال فیلتر
				</button>
			</div>
		</div>
	</div>
</div>

<!-- View By Modal -->
<div class="modal fade" id="viewbyModal" tabindex="-1" aria-labelledby="viewbyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content rounded-0 bg-two">
			<div class="modal-header">
				<h5 class="modal-title" id="viewbyModalLabel">
					مشاهده بر اساس
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-2">
				@include('site.products.contents.viewby')
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-bs-dismiss="modal">
					اعمال فیلتر
				</button>
			</div>
		</div>
	</div>
</div>