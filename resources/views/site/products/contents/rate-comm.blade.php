

@php
    $star =
    App\Models\Comment::where('commentable_id',$product->id)->where('commentable_type','App\Models\Product')->whereNull('parent_id')->whereNotNull('star')->where('status','1')->pluck('star')->toArray();


    if (array_sum(@$star) != 0 || count(@$star) != 0){
        @$average = array_sum(@$star) / count(@$star);
    }
    else{
        $average = 0;
    }


@endphp
<div class="">
    <a href="#other">
        <div class="d-flex align-items-center justify-content-end float-right">
		<div class="star-ratings-sprit mb-1">
                <span class="star-ratings-sprit-rating" style="width:{{(@$average)*20}}%;"></span>
            </div>
			<span class="bg-transparent py-0 px-2 me-1 rounded-3 text-secondary">
				@if (is_nan($average) || is_infinite($average))
                    {{0}}
                @else
                    {{@$average}}
                @endif
			</span>
         
        </div>
    </a>
</div>
