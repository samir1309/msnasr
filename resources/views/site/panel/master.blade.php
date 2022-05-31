<!DOCTYPE html>
<html lang="fa">
<head>

@include('layouts.site.blocks.head')
<div id="shop68" v-cloak>
<body>
@include('sweet::alert')
	@include('layouts.site.blocks.menu')


	<div class="panel py-5">
			<div class="container">
				<div class="row w-100 m-0">
					@include('site.panel.content.sidenav')
					<div class="col-xl-9 col-lg-8 col-md-7 p-2">
						<!-- Variable -->
						@yield('content')
						<!-- Variable -->
					</div>
				</div>
			</div>
		</div>
		
	
	
	
  @include('layouts.site.blocks.footer')
     @include('layouts.site.blocks.script')

	</body>
	</div>
</html>
