<main class="content">
		<div class="blog blog-details pb-5 pt-3">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-12 px-2 py-md-4 py-1">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb p-0 m-0">
								<li class="breadcrumb-item">
									<a href="/">
										<i class="bi bi-house me-1"></i>
										خانه
									</a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{url('/article-category')}}">
										لیست مقالات
									</a>
								</li>
								<li class="breadcrumb-item">
										<a href="{{url('/article-list',['id'=>$blog->cat->id])}}">
											{{@$blog->cat->title}}
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										{{@$blog->title}}
									</li>
							</ol>
						</nav>
					</div>
					<div class="col-xl-9 col-12 col-lg-8 p-md-3 p-sm-1 p-0">
						<img src="images/1.webp" alt="" srcset="images/1.webp" width="100%" height="auto">
						<div class="description text-justify py-4">
							لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
							گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
							برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
							کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان
							جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه
							ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می
							توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به
							پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته
							اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم متن ساختگی با
							تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
							متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
							تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
							کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان
							را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
							طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید
							داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و
							زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
							موجود طراحی اساسا مورد استفاده قرار گیرد.
						</div>
						<div class="share border-bottom py-2">
							<div class="row w-100 m-0">
								<div class="col-md px-1 py-md-0 py-2">
									<ul class="p-0 m-0 d-flex align-items-center justify-content-start">
										<li class="list-unstyled me-2">
											<span>
												اشتراک :
											</span>
										</li>
										<li class="list-unstyled me-xl-4 me-sm-2">
											<a href="" class="linkshare" data-bs-toggle="modal"
												data-bs-target="#shareModal">
												<i class="bi bi-share d-flex ms-1 text-dark"></i>
											</a>
											<div class="modal fade" id="shareModal" tabindex="-1"
												aria-labelledby="shareModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title"
																id="shareModalLabel">
																اشتراک گذاری مقاله
															</h5>
															<button type="button" class="btn-close"
																data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<ul
																class="p-0 m-0 d-flex align-items-center justify-content-center">
																<li
																	class="list-unstyled me-xl-2 me-sm-2">
																	<a href=""
																		class="linkshare whatsapp p-1 d-flex">
																		<i
																			class="bi bi-whatsapp d-flex"></i>
																	</a>
																</li>
																<li
																	class="list-unstyled me-xl-2 me-sm-2">
																	<a href=""
																		class="linkshare facebook p-1 d-flex">
																		<i
																			class="bi bi-facebook d-flex"></i>
																	</a>
																</li>
																<li
																	class="list-unstyled me-xl-2 me-sm-2">
																	<a href=""
																		class="linkshare instagram p-1 d-flex">
																		<i
																			class="bi bi-instagram d-flex"></i>
																	</a>
																</li>
																<li
																	class="list-unstyled me-xl-2 me-sm-2">
																	<a href=""
																		class="linkshare telegram p-1 d-flex">
																		<i
																			class="bi bi-telegram d-flex"></i>
																	</a>
																</li>
																<li
																	class="list-unstyled me-xl-2 me-sm-2">
																	<a href=""
																		class="linkshare twitter p-1 d-flex">
																		<i
																			class="bi bi-twitter d-flex"></i>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="col-md px-1 py-md-0 py-2">
									<ul class="p-0 m-0 d-flex align-items-center justify-content-end">
										<li class="list-unstyled ms-xl-3 ms-sm-3">
											<p class="h6 m-0 d-flex text-secondary">
												12
												<i class="bi bi-eye-fill d-flex ms-1"></i>
											</p>
										</li>
										<li class="list-unstyled ms-xl-3 ms-sm-3">
											<p class="h6 m-0 d-flex text-secondary">
												12
												<i class="bi bi-chat-fill d-flex ms-1"></i>
											</p>
										</li>
										<li class="list-unstyled ms-xl-3 ms-sm-3">
											<p class="h6 m-0 d-flex text-secondary">
												دسته
												<i class="bi bi-folder-fill d-flex ms-1"></i>
											</p>
										</li>
										<li class="list-unstyled ms-xl-3 ms-sm-3">
											<p class="h6 m-0 d-flex text-secondary">
												نام نویسنده
												<i class="bi bi-person-fill d-flex ms-1"></i>
											</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="comments py-4">
							<a href="#formComment" class="btn btn-lg px-5 btn-optic rounded-0">
								ثبت نظر
							</a>
							<p class="ismb px-1 h5 mt-4 mb-2 text-start text-dark">
								نظرات (۷)
							</p>
							<div class="row w-100 m-0">
								<div class="col-12 pe-xl-0 ps-xl-0 px-0">
									<div class="col-xxl-12 px-0 pb-2">
										<div class="card p-3">
											<p class="d-flex align-items-center m-0">
												<i class="bi bi-person-circle h2 my-0 me-2"></i>
												<span class="ismb">
													نام و نام خانوادگی
												</span>
												<a href="" class="ms-4 text-secondary">
													<i class="bi bi-reply"></i>
													پاسخ
												</a>
											</p>
											<small class="pt-2 d-flex text-secondary">
												۱۰ فروردین ۱۴۰۰
											</small>
											<div class="text-secondary mt-2">
												لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
												با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
												و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
											</div>
											<div class="col-xxl-11 ms-auto px-2 pt-3 pb-2">
												<div class="bg-light p-3">
													<p class="d-flex align-items-center m-0">
														<i class="bi bi-person-circle h2 my-0 me-2"></i>
														<span class="ismb">
															نام و نام خانوادگی
														</span>
													</p>
													<small class="pt-2 d-flex text-secondary">
														۱۰ فروردین ۱۴۰۰
													</small>
													<div class="text-secondary mt-2">
														لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
														صنعت چاپ و با استفاده از طراحان گرافیک است.
														چاپگرها و متون بلکه روزنامه و مجله در ستون و
														سطرآنچنان که لازم است و برای شرایط
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xxl-12 px-0 pb-2">
										<div class="card p-3">
											<p class="d-flex align-items-center m-0">
												<i class="bi bi-person-circle h2 my-0 me-2"></i>
												<span class="ismb">
													نام و نام خانوادگی
												</span>
												<a href="" class="ms-4 text-secondary">
													<i class="bi bi-reply"></i>
													پاسخ
												</a>
											</p>
											<small class="pt-2 d-flex text-secondary">
												۱۰ فروردین ۱۴۰۰
											</small>
											<div class="text-secondary mt-2">
												لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
												با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
												و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
											</div>
											<div class="col-xxl-11 ms-auto px-2 pt-3 pb-2">
												<div class="bg-light p-3">
													<p class="d-flex align-items-center m-0">
														<i class="bi bi-person-circle h2 my-0 me-2"></i>
														<span class="ismb">
															نام و نام خانوادگی
														</span>
													</p>
													<small class="pt-2 d-flex text-secondary">
														۱۰ فروردین ۱۴۰۰
													</small>
													<div class="text-secondary mt-2">
														لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
														صنعت چاپ و با استفاده از طراحان گرافیک است.
														چاپگرها و متون بلکه روزنامه و مجله در ستون و
														سطرآنچنان که لازم است و برای شرایط
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="formComment"></div>
								<br>
								<br>
								<p class="ismb px-1 h5 mt-4 mb-2 text-start text-dark">
									فرم ارسال نظر
								</p>
								<div class="col-12 ps-xl-0 pe-xl-0 px-0">
									<form action="" class="m-0">
										<div class="row w-100 m-0">
											<div class="col-12 px-0 pb-2">
												<div class="form-floating">
													<input type="text" class="form-control"
														id="nameComment" placeholder="نام و نام خانوادگی">
													<label for="nameComment" class="text-secondary">
														نام و نام خانوادگی
													</label>
												</div>
											</div>
											<div class="col-12 px-0 pb-2">
												<div class="form-floating">
													<textarea class="form-control"
														placeholder="نظر خود را بنویسید..."
														id="textComment" style="height: 7rem"></textarea>
													<label for="textComment" class="text-secondary">
														نظر خود را بنویسید ...
													</label>
												</div>
											</div>
											<div
												class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8 col-12 ms-auto px-0 pb-2">
												<button type="submit" class="btn btn-optic w-100">
													ثبت نظر
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-12 col-lg-4 p-0">
						<div class="sideblog">
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
									<p class="ismb h5 px-2 text-end text-a">
										مقالات مرتبط
									</p>
									<div class="row w-100 m-0">
									
										<div class="col-lg-12 col-sm-6 p-md-2 px-0 py-2">
											<a href="" class="blogpopular d-flex">
												<div class="row w-100 m-0">
													<div class="col-9 align-self-center ps-2 pe-3">
														<p class="h6 fw-bolder text-end text-dark my-1">
															عنوان آزمایشی شماره یک مقاله
														</p>
														<p
															class="h6 fw-bolder text-end text-secondary my-1">
															۱۰ فروردین ۱۴۰۰
														</p>
													</div>
													<div class="col-3 align-self-center p-0">
														<img src="images/2.webp" alt=""
															srcset="images/2.webp" class="w-100 border">
													</div>
												</div>
											</a>
										</div>
										
								</div>
								</div>
							</div>
							<div class="col-xxl-12 px-0 pb-0 pt-3">
								<div class="p-2 w-100">
									<p class="ismb h5 px-2 text-end text-a">
										دسته بندی
									</p>
									<div class="row w-100 m-0">
										<div class="col-lg-12 col-sm-6 p-md-2 px-0 py-2">
											<a href="" class="blogpopular d-flex pt-2">
												<div class="row w-100 m-0 border-bottom pb-2">
													<div class="col-12 align-self-center">
														<p class="h6 fw-bolder text-end text-dark my-1">
															عنوان دسته یک
														</p>
													</div>
												</div>
											</a>
										</div>
										<div class="col-lg-12 col-sm-6 p-md-2 px-0 py-2">
											<a href="" class="blogpopular d-flex pt-2">
												<div class="row w-100 m-0 border-bottom pb-2">
													<div class="col-12 align-self-center">
														<p class="h6 fw-bolder text-end text-dark my-1">
															عنوان دسته دو
														</p>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl-12 px-0 pb-0 pt-3">
								<div class="p-2 w-100">
									<p class="ismb h5 px-2 text-end text-a">
										تگ ها
									</p>
									<div class="col-12 text-end p-md-2 px-0 py-2">
										<ul class="p-0 m-0 tagblog">
											<li class="list-unstyled">
												<a href="" class="p-1 d-flex">
													تگ یک
												</a>
											</li>
											<li class="list-unstyled">
												<a href="" class="p-1 d-flex">
													تگ دو
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xxl-12 px-0 pb-0 pt-3">
								<div class="p-2 w-100">
									<p class="ismb h5 px-2 text-end text-a">
										صفحه اجتماعی
									</p>
									<div class="col-12 p-md-2 px-0 py-2">
										<ul class="p-0 m-0 socialblog">
											<li class="list-unstyled d-inline">
												<a href="">
													<i class="bi bi-telegram my-0"></i>
												</a>
											</li>
											<li class="list-unstyled d-inline">
												<a href="">
													<i class="bi bi-twitter my-0"></i>
												</a>
											</li>
											<li class="list-unstyled d-inline">
												<a href="">
													<i class="bi bi-facebook my-0"></i>
												</a>
											</li>
											<li class="list-unstyled d-inline">
												<a href="">
													<i class="bi bi-whatsapp my-0"></i>
												</a>
											</li>
											<li class="list-unstyled d-inline">
												<a href="">
													<i class="bi bi-instagram my-0"></i>
												</a>
											</li>
											<li class="list-unstyled d-inline">
												<a href="">
													<i class="bi bi-linkedin my-0"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
			
			</div>
			</div>
		</div>
	</main>
	
	