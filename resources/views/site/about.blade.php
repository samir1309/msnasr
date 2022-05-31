@extends('layouts.site.master')

@section('content')

<div class="aboutus pb-5 pt-3">
			<div class="container">
				<div class="col-12 px-2 py-md-4 py-1">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb p-0 m-0">
							<li class="breadcrumb-item">
								<a href="/">
									<i class="bi bi-house me-1"></i>
									خانه
								</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								درباره ما
							</li>
						</ol>
					</nav>
				</div>
				<div class="p-2">
					<div class="bg-light p-4 rounded-custom">
						<h1 class="ismb text-optica">
							<?php $setting_header = App\Models\Setting::first();  ?>
							
					{{@$setting_header->abouttitle}}
						</h1>
						<div class="description">
						{!! @$setting_header->about !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	

@stop
