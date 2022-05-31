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
																	<a href="whatsapp://send?text={{url('/article-details' ,['id'=>$blog->id])}}"
																		class="linkshare whatsapp p-1 d-flex">
																		<i
																			class="bi bi-whatsapp d-flex"></i>
																	</a>
																</li>
																<li
																	class="list-unstyled me-xl-2 me-sm-2">
																	<a href="https://t.me/share/url?url={{url('/article-details' ,['id'=>$blog->id])}}"
																		class="linkshare telegram p-1 d-flex">
																		<i
																			class="bi bi-telegram d-flex"></i>
																	</a>
																</li>
																<!--<li
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
																		class="linkshare twitter p-1 d-flex">
																		<i
																			class="bi bi-twitter d-flex"></i>
																	</a>
																</li>-->
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>