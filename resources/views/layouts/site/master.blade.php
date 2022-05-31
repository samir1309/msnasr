<html lang="fa">

@include('layouts.site.blocks.head')

<body>
<div id="shop68" v-cloak>
@include('sweet::alert')
	@include('layouts.site.blocks.menu')
	
	@if(Request::url() == '/')
			@include('layouts.site.blocks.slider')
	@endif
	
		
	  @yield('content')
	
	
  @include('layouts.site.blocks.footer')

  

	 </div>

	 @include('layouts.site.blocks.script')
	 @include('layouts.message-swal')
	</body>
	
</html>