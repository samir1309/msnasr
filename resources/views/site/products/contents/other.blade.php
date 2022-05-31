			<div class="col-12 p-2">
						<div class="bg-light rounded-custom tab-info-pro p-2">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill"
										data-bs-target="#pills-1" type="button" role="tab"
										aria-controls="pills-1" aria-selected="true">
										توضیحات
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-2-tab" data-bs-toggle="pill"
										data-bs-target="#pills-2" type="button" role="tab"
										aria-controls="pills-2" aria-selected="false">
										مشخصات کالا
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-3-tab" data-bs-toggle="pill"
										data-bs-target="#pills-3" type="button" role="tab"
										aria-controls="pills-3" aria-selected="false">
										نظرات کابران
									</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button"
										role="tab" aria-controls="pills-5" aria-selected="false">
										ویدئو و تیزر
									</button>
								</li>
							</ul>
						
						<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane p-3 fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
									<p class="ismb h4 mt-4 mb-2">
										توضیحات
									</p>
									<div class="description">
										@include('site.products.contents.description')
									</div>
								</div>
								<div class="tab-pane p-3 fade" id="pills-2" role="tabpanel"
									aria-labelledby="pills-2-tab">
								@include('site.products.contents.specifications')
							</div>
								<div class="tab-pane p-3 fade" id="pills-3" role="tabpanel"
									aria-labelledby="pills-3-tab">
									@include('site.products.contents.usercomments')
								</div>
								<div class="tab-pane p-3 fade" id="pills-4" role="tabpanel"
									aria-labelledby="pills-3-tab">
									
									@include('site.products.contents.videos')
								</div>
							</div>

						</div>
					</div>