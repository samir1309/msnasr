<div class="col-12 ps-xl-0 pe-xl-0 px-0">
<form method="post" action="{{URL::action('App\Http\Controllers\Site\HomeController@postComment')}}"
enctype="multipart/form-data" class="m-0">
    {{ csrf_field() }}
    <input type="hidden" name="commentable_id" value="{{$blog->id}}">
    <input type="hidden" name="commentable_type" value="{{"App\Models\Content"}}">
										<div class="row w-100 m-0">
											<div class="col-12 px-0 pb-2">
												<div class="form-floating">
													<input type="text" name="title"  class="form-control"
														id="nameComment" placeholder="نام و نام خانوادگی">
													<label for="nameComment" class="text-secondary">
													نام و نام خانوادگی
													</label>
												</div>
											</div>
											<div class="col-12 px-0 pb-2">
												<div class="form-floating">
													<textarea class="form-control" name="content"
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