@extends('frontend.layouts.master')

@section('content')



		
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										<li><a href="#">T-shirts</a></li>
										<li><a href="#">jacket</a></li>
										<li><a href="#">jeans</a></li>
										<li><a href="#">sweatshirts</a></li>
										<li><a href="#">trousers</a></li>
										<li><a href="#">kitwears</a></li>
										<li><a href="#">accessories</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										<div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
													</div>
												</div>
											</div>
										</div>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
											</li>
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select id="sortBy">
												<option selected="selected">Default Sort</option>
												<option value="priceAsc">Price-Lower To Higher</option>
												<option value="priceDesc">Price-Higher To Lower</option>
												<option value="titleAsc">Alphabetical Ascending</option>
												<option value="titleDesc">Alphabetical Descending</option>
												<option value="discAsc">Discount-Lower To Higher</option>
												<option value="discDesc">Discount-Higher To Lower</option>


												<option>Size</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
							
						
							
@if(count($product)>0)
    

@foreach ($product as $item)
<div class="col-lg-4 col-md-6 col-12">
  <div class="single-product">
	  <div class="product-img">
		  {{-- product image--}}
	  
		  <a href="product-details.html">
			  @php
			  $photo=explode(',',$item->photo);
			  @endphp
			  <img class="default-img" src="{{$photo[0]}}" alt="#">
			  {{--<img class="hover-img" src="{{$photo[1]}}" alt="#">--}}
			  <span class="new">{{$item->condition}}</span>
		  </a>
		  <div class="button-head">
			  <div class="product-action">
				  <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
				  <a title="Wishlist" href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
				  <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
			  </div>
			  <div class="product-action-2">
				  <a title="Add to cart"  href="#" data-quantity="1" data-product-id="{{$item->id}} " class="add_to_cart" id="add_to_cart{{$item->id}}">Add to cart</a>
			  </div>
		  </div>
	  </div>
	  <div class="product-content">
		  <h3><a href="{{route('product.detail',$item->slug)}}">{{$item->title}}</a></h3>
			<p>{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
		  <div class="product-price">
			  <span>${{number_format($item->offer_price,2)}} <small><del class="text-danger ">${{number_format($item->price,2)}}</del></small></span>
		  </div>
	  </div>
  </div>
</div>
@endforeach
@endif

						{{--single product--}}
					 	{{--@include('frontend\layouts\single-product')--}}

						 

							{{--single product--}}
						</div>
						{{--	<div   class="ajax-load " style="text-align: center, display:none ">
							<img src="{{asset('Frontends/images/ll.gif')}}" style="width:10%" alt="">


						</div>

						
						<div class="d-flex align-items-center justify-content-center" style="height: 350px">
							<img src="{{asset('Frontends/images/ll.gif')}}" style="width:10%" alt="">

						  </div>--}}
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

	
		
		
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
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 

<script>
$('#sortBy').change(function(){
	var sort=$('#sortBy').val();
	//alert(sort);
	window.location="{{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;

});

</script>

{{--<script>

	function loadmoredata(page){
		$.ajax({
			url:'?page='+page,
			type:'get',
			beforesendata:function(){
				$('.ajax-load').show();
			},
			.done(function name( data) {
				if (data.html=='') {
					$('.ajax-load').html('NO more products');
					return;
					
				}
				$('.ajax-load').hide();

				$('#product-data').append(data.html);

				//console.log(data)
				
			})
			.fail (function () {
				alert('somtin went wrong');
				
			})
		})
	}
	var page=1;
	if ($(window).scrollTop()+$(window).height()+120>=$(document).height()){
        
		page++;
		loadmoredata(page);
		
	}
</script>--}}
{{--add to cart--}}
<script>
	$(document).on('click','.add_to_cart',function (e) {
		e.preventDefault();
		var product_id=$(this).data('product-id');
		var product_qty=$(this).data('quantity');
		//alert(product_qty);

		//alert(product_id);


		var token="{{csrf_token()}}";
		var path="{{route('cart.store')}}";

		$.ajax({
			url:path,
			type:"POST",
			dataType:"JSON",
			data:{
				product_id:product_id,
				product_qty:product_qty,
				_token:token,
			},
		     beforeSend:function(){
				 $('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
			 },

			 complete:function(){

				$('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus "></i> Add To Cart');
				
				},
				success:function(data){
					//console.log(data);
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
	$(document).on('click','.add_to_wishlist',function (e) {
		e.preventDefault();
		var product_id=$(this).data('id');
		var product_qty=$(this).data('quantity');
		//alert(product_qty);

		//alert(product_id);


		var token="{{csrf_token()}}";
		var path="{{route('wishlist.store')}}";

		$.ajax({
			url:path,
			type:"POST",
			dataType:"JSON",
			data:{
				product_id:product_id,
				product_qty:product_qty,
				_token:token,
			},
		     beforeSend:function(){
				 $('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner fa-spin"></i>');
			 },

			 complete:function(){

				$('#add_to_wishlist_'+product_id).html('<i class="fas fa-heart "></i> Add To Cart');
				
				},
				success:function(data){
					//console.log(data);
					if(data['status']){
						$('body #header-ajax').html(data['header']); 
					$('body #wishlist_counter').html(data['wishlist_count']); 
						

						swal({
									title: "Good job!",
									text: data['message'],
									icon: "success",
									button: "OK",
							});

					}
					else if(data['present']){
						$('body #header-ajax').html(data['header']); 
					$('body #wishlist_counter').html(data['wishlist_count']);
						
						swal({
									title: " oops!",
									text: data['message'],
									icon: "warning",
									button: "OK",
							});

					}else{

						swal({
									title: "Sorry!",
									text:"you cant add that product",
									icon: "error",
									button: "OK",
							});

					}
				},
				
		});
		
	});
</script>
@endsection