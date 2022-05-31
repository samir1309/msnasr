<!doctype html>
<html lang="fa">
@include('layouts.admin.blocks.head')

<body dir="rtl">
@include('sweet::alert')
	<div class="">
		<div class="">
			@yield('content')
		</div>
	</div>
	@include('layouts.admin.blocks.script')

</body>

</html>