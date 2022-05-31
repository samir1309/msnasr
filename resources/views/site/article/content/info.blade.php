<h1 class="fw-bolder text-center ismb h2">
						{{@$blog->title}}
					</h1>
					<img src="{{asset('assets/uploads/content/art/big/'.$blog->image)}}" alt="{{@$blog->title}}" width="100%" height="auto"  class="w-100">
						<div class="description text-justify py-4">
						{!! @$blog->description !!}
						</div>