<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	<!-- Header -->
	
	@include('frontend.layouts.header')


	<!--/ End Header -->

	@yield('content')
	

	<!-- Jquery -->
    @include('frontend.layouts.script')
</body>
</html>