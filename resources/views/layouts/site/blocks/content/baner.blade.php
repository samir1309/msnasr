<div class="bnr">
			<div class="container">
				<div class="row w-100 m-0">
				@foreach($banner as $row)

					<div class="col-md col-sm-6 p-2">
					@if(@$row['link'] != null)
								<a  href= "{{@$row['link']}}" rel="noopener noreferrer nofollow"
									>
									<div class="bc">
										<img srcset="{{asset('assets/uploads/content/sli/'.@$row['image'])}} 2x, {{asset('assets/uploads/content/sli/'.@$row['image'])}} 1x" src="{{asset('assets/uploads/content/sli/'.@$row['image'])}}"
											alt="{!! @$row['title'] !!}" class="w-100">
									</div>
								</a>
                                @else
                                <a
                                href="">
                                    <div class="bc">
                                        <img srcset="{{asset('assets/uploads/content/sli/'.@$row['image'])}} 2x, {{asset('assets/uploads/content/sli/'.@$row['image'])}} 1x" src="{{asset('assets/uploads/content/sli/'.@$row['image'])}}"
                                             alt="{!! @$row['title'] !!}" class="w-100">
                                    </div>
                                </a>
                                @endif
					</div>
				@endforeach
				</div>
			</div>
		</div>
	