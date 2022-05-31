<p class="d-flex align-items-center m-0">
												<i class="bi bi-person-circle h2 my-0 me-2"></i>
												<span class="ismb">
												{{$comment->title}}
												</span>
									
												<button type="button"
				class="btn btn-link text-secondary d-flex align-items-center btn-sm text-decoration-none"
                    data-bs-toggle="modal" data-bs-target="#firstModal{{@$comment->id}}">
				<i class="bi bi-reply me-1 h5 my-0"></i>
				پاسخ
			</button>


											</p>
											<small class="pt-2 d-flex text-secondary">
											{{jdate('Y/m/d',$comment->created_at->timestamp)}}
											</small>
											<div class="text-secondary mt-2">
											{{$comment->content}}
											</div>


	<div class="modal fade" id="firstModal{{@$comment->id}}" tabindex="-1" aria-labelledby="firstModalLabel{{@$comment->id}}" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content rounded-0">
			<div class="modal-header">
                <h5 class="modal-title" id="firstModalLabel{{@$comment->id}}">
					پاسخ به نظر
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body bg-light">
				@include('site.article.content.comments-blocks.form2')
			</div>
		</div>
	</div>
</div>