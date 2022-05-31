@extends('layouts.site.master')

@section('content')

<main class="content">
		 @include('layouts.site.blocks.content.slider')
		 @include('layouts.site.blocks.content.options')
		 @include('layouts.site.blocks.content.category')
		 @include('layouts.site.blocks.content.products')
		 @include('layouts.site.blocks.content.baner')
		 @include('layouts.site.blocks.content.discount')
		 @include('layouts.site.blocks.content.brands')
		  @include('layouts.site.blocks.content.blog')
	</main>
	
	@stop
