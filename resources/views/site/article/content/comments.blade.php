<a href="#formComment" class="btn btn-lg px-5 btn-optic rounded-0">
								ثبت نظر
							</a>
							<p class="ismb px-1 h5 mt-4 mb-2 text-start text-dark">
							نظرات ({{$comments_count}})
							</p>
							<div class="row w-100 m-0">
								<div class="col-12 pe-xl-0 ps-xl-0 px-0">
									<div class="col-xxl-12 px-0 pb-2">
										<div class="card p-3">
											

										@foreach($comments as $comment)
											@include('site.article.content.comments-blocks.first-comment')
											<!-- reply comment -->
												@foreach($comment->replies as $reply)
											@include('site.article.content.comments-blocks.reply-comment')
												@endforeach
											@endforeach
										</div>
									</div>
								
								</div>
								
								<div id="formComment"></div>
								<br>
								<br>
								<p class="ismb px-1 h5 mt-4 mb-2 text-start text-dark">
									فرم ارسال نظر
								</p>
								@include('site.article.content.comments-blocks.form')
							</div>