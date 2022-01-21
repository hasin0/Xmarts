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
	<header class="header shop" id="header-ajax">
	    @include('frontend.layouts.header')
   </header>


	<!--/ End Header -->
<div class="row">
	<div class="col-md-12">
		@include('backend.layouts.notification')
	</div>

</div>
	
	@yield('content') 
    
	<!-- Start Footer Area -->
    @include('frontend.layouts.footer')
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    @include('frontend.layouts.script')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script>
		$(document).on('click','.cart_delete',function (e) {
			e.preventDefault();
			var cart_id=$(this).data('id');
														//alert(cart_id);
														//var product_qty=$(this).data('quantity');
														//alert(product_qty);
												
														//alert(product_id);
	
	
			var token="{{csrf_token()}}";
			var path="{{route('cart.delete')}}";
	
			$.ajax({
				url:path,
				type:"POST",
				dataType:"JSON",
				data:{
				    cart_id:cart_id,
					_token:token,
				},
					success:function(data){
						console.log(data);
						//$('body #header-ajax').html(data['header']); 
						//$('body #cart-counter').html(data['cart-counter']); 
						if(data['status']){
							$('body #header-ajax').html(data['header']); 
						$('body #cart-counter').html(data['cart-counter']); 
					
							
	
							swal({
										title: "Good job!",
										text: data['message'],
										icon: "success",
										button: "OK",
								});
	
						}
					},
					error:function(err){
							console.log(err);
						}
			});
			
		});
	</script>

	<script>
		$(document).ready(function () {
			var path="{{route('autosearch')}}";
			$('#search_text').autocomplete({
				source:function(request,response){
					$.ajax({
						url:path,
						dataType:"JSON"
						data:{
							term:request.term
						},
						success:function(data){
							response(data);
						}
					});
				}
			});
		});
	</script>

</body>
</html>