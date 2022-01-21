@extends('frontend.layouts.master')

@section('content')



	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row" >
				<div class="col-12" id="cart_list">
					<!-- Shopping Summery -->
					{{--@include('frontend.layouts.cart_list')--}}


                    <table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>

							@foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item )

							
							<tr>
								<td class="image" data-title="No"><img src="{{$item->model->photo}}" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a></p>
									<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
								</td>
								<td class="price" data-title="Price"><span>${{$item->price}} </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<div class="quantity">

											<input type="number" name="quantity" class="input-number"  id="qty-input-{{$item->rowId}}" data-id="{{$item->rowId}}" data-min="1" data-max="100" value="{{$item->qty}}">
                                               
											<input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}" >


										</div>

										
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>${{$item->subtotal()}}</span></td>
								<td class="action"  data-title="Remove"><a href="#"  class="remove   cart_delete" ><i class="ti-trash remove-icon   cart_delete "   data-id="{{$item->rowId}}"></i></a></td>
							</tr>

								
							@endforeach








						</tbody>
					</table>
				
					<!--/ End Shopping Summery -->
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="{{route('coupon.add')}}" id="coupon-form" method="post">
											@csrf
											<input type="text" class="form-control" name="code" placeholder="Enter Your Coupon">
											<button type="submit" class="coupon-btn btn-primary">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></li>
										<li>Shipping<span>${{number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</span></li>
										 @if(session()->has('coupon'))
										<li>You Save<span>${{number_format(Session::get('coupon')['value'],2)}}</span></li>
										@endif


										@if(session()->has('coupon'))
                                        <li class="last">You Pay<span>${{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-Session('coupon')['value']}}</span></li>
							             @elseif (\Illuminate\Support\Facades\Session::get('checkout'))
										 <li>Cart Subtotal<span>${{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+Session('checkout')[0]['delivery_charge']}}</span></li>

										 @elseif (session()->has('coupon')  && \Illuminate\Support\Facades\Session::get('checkout') )
										 <li>Cart Subtotal<span>${{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+Session('checkout')[0]['delivery_charge']-\Illuminate\Support\Facades\Session::get('coupon')['value']),2}}</span></li>


		

										 @endif
									</ul>
									<div class="button5">
										<a href="{{Route('checkout.store')}}" class="btn">Checkout</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	
	
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->



@endsection


@section('scripts')


<script>
		$(document).on('click','.coupon-btn',function (e) {
			e.preventDefault();
			var code=$('input[name=code]').val();
			//alert(code);
			$('.coupon-btn').html(' <i class="fas fa-spinner fa-spin"></i>  Applying..');
			$('#coupon-form').submit();
})



</script>



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
$(document).on('click','.input-number', function(){
 var id=$(this).data('id');
// alert(id);

var spinner=$(this),input=spinner.closest("div.quantity").find('input[type="number"]');
 //alert(input.val());

 if (input.val()==1){

	 return false;
	 
 }

 if (input.val()!=1){

	 var newVal=parseFloat(input.val());
	 $('#qty-input-'+id).val(newVal);
	 
 }

 var productQuantity=$("#update-cart-"+id).data('product-quantity');
 //alert(productQuantity);
 update_cart(id,productQuantity);

});

function update_cart(id,productQuantity){
	var rowId=id;
	var product_qty=$('#qty-input-'+rowId).val();
	var token="{{csrf_token()}}";
	var path="{{route('cart.update')}}";


	$.ajax({
		url:path,
		type:"POST",
		data:{
			_token:token,
			product_qty:product_qty,
			rowId:rowId,
			productQuantity:productQuantity,
		},
		success:function (data){
			console.log(data);
			//alert(data['status'])
			if(data['status']){
							$('body #header-ajax').html(data['header']); 
							$('body #cart-counter').html(data['cart-counter']); 
							$('body #cart_list').html(data['cart_list']); 

					
							
	
							//swal({
							//			title: "Good job!",
							//			text: data['message'],
							//			icon: "success",
							//			button: "OK",
							//	});

							alert(data['message']);
	
						}
						else{
							alert(data['message']);


						}
		}
	})
}

</script>


@endsection