	<div class="col-xl-3 col-12 col-lg-4 p-0">
						<div class="sideblog sticky position-sticky">
							<div class="col-xxl-12 p-md-3 p-1">
								<form action="" class="m-0 position-relative">
									<input type="search" name="" id=""
										class="form-control form-control-lg bg-light rounded-0 border-0 h6"
										placeholder="جستجو">
									<button type="submit" class="btn position-absolute top-0 bottom-0 end-0">
										<i class="bi bi-search text-secondary d-flex"></i>
									</button>
								</form>
							</div>
							<div class="col-xxl-12 px-0 pb-0 pt-3">
								<div class="p-2 w-100">
									<p class="ismb h5 px-2 text-first text-a">
										مقالات مرتبط
									</p>
									<div class="row w-100 m-0">
									@foreach($blogs as $relate)
										<div class="col-lg-12 col-sm-6 p-md-2 px-0 py-2">
											<a href="" class="blogpopular d-flex">
												<div class="row w-100 m-0">
												<div class="col-3 align-self-center p-0">
								<img  class="w-100 border" @if(file_exists('assets/uploads/content/art/big/'.$relate->image)) src="{{asset('assets/uploads/content/art/big/'.$relate->image)}}" alt="{{@$relate->title}}" @else src="{{asset('assets/site/images/notfound.png')}}" @endif class="w-100" />

													</div>
													<div class="col-9 align-self-center ps-2 pe-3">
														<p class="h6 fw-bolder text-first text-dark my-1">
														{{@$relate->title}}
														</p>
														<p
															class="h6 fw-bolder text-first text-secondary my-1">
															<small>بازدید{{@$relate->view }}</small>
														</p>
													</div>
													
												</div>
											</a>
										</div>
										@endforeach
								</div>
								</div>
							</div>
						
							
						
						</div>
					</div>
			