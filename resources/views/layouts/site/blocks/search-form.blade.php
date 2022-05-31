

						<div class="col-sm-6 col-12 align-self-center p-1">
							<ul class="p-0 my-0 me-0 ms-auto d-flex justify-content-start col-md-6">
								<li class="list-unstyled w-100">
									<form  method="GET" action="{{URL::action('App\Http\Controllers\Site\HomeController@getSearch')}}" class="m-0 w-100 position-relative">
										<input type="search" name="search"   class="form-control form-control-sm rounded-pill"
											placeholder="جستجو...">
										<button type="submit"
											class="btn position-absolute top-0 bottom-0 end-0">
											<i class="bi bi-search"></i>
										</button>
									</form>
								</li>
							</ul>
						</div>