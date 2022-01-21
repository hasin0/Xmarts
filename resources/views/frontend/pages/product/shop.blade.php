@extends('frontend.layouts.master')

@section('content')


<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Shop Grid</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style -->
<form action="{{route('shop.filter')}}" method="POST">
    @csrf
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">

                    @if(count($cats)>0)
                        <!-- Single Widget -->
                        


                                <div class="single-widget category">
                                    <h3 class="title">Categories</h3>

                                    @if (!empty ($GET['category']))

                                      @php
                                          $filter_cats=explode(',',$_GET['category']);
                                      @endphp
                                        
                                    @endif

                                    
                                    @foreach ( $cats as $cat )
                                        
                                   
                                    <ul class="categor-list">
                                        
                                        <li><input name="category[]"   @if(!@empty($filter_cats) && in_array($cat->slug,$filter_cats)) checked @endif
                                            
                                        id="{{$cat->slug}}" type="checkbox" onchange="this.form.submit();" value="{{$cat->slug}}"><span class="count"><a href="{{$cat->slug}}">{{ucfirst($cat->title)}} <span>({{count($cat->products)}})</span></a></li>
                                    </ul>
                                    @endforeach
                                </div>




                              </form>



                    @endif
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Shop by Price</h3>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    @php
                                        $max=DB::table('products')->max('price');
                                        // dd($max);
                                    @endphp
                                    <div id="slider-range" data-min="0" data-max="{{$max}}"></div>
                                   

                                    <div class="product_filter">
                                    <button type="submit" class="filter_button">Filter</button>
                                   

                                   
                                   
                                    <div class="label-input">

                                        
                                        <span>Range:</span>
                                        <input style="" type="text" id="amount" readonly/>
                                        <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <ul class="check-box-list">
                                <li>
                                    <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
                                </li>
                            </ul> --}}
                        </div>
                            <!--/ End Shop By Price -->


                            <div class="single-widget category">
                                <h3 class="title">Brands</h3>
                                <ul class="categor-list">

                                    @if (!empty ($GET['brand']))

                                      @php
                                          $filter_brands=explode(','.$_GET['brand']);
                                      @endphp
                                        
                                    @endif

                                    {{--@php
                                        $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->with('products')->get();
                                    @endphp--}}
                                    @foreach($brands as $brand)
                                    <li><input name="brand[]" id="{{$brand->slug}}" type="checkbox"    @if(!@empty($filter_brands) && in_array($cat->slug,$filter_brands)) checked @endif onchange="this.form.submit();" value="{{$brand->slug}}"><span class="count"><a href="{{$brand->slug}}">{{ucfirst($brand->title)}} <span>({{count($brand->products)}})</span></a></li>  


                                    @endforeach
                                </ul>
                            </div>
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
                        {{--<div class="single-widget category">
                            <h3 class="title">Manufacturers</h3>
                            <ul class="categor-list">
                                <li><a href="#">Forever</a></li>
                                <li><a href="#">giordano</a></li>
                                <li><a href="#">abercrombie</a></li>
                                <li><a href="#">ecko united</a></li>
                                <li><a href="#">zara</a></li>
                            </ul>
                        </div>--}}
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
                                    <select name="sortBy" onchange="this.form.submit();">
                                        <option>Default Sort</option>
                                        <option value="priceAsc" @if (!@empty($_GET['sortBy'])&& $_GET['sortBy']=='priceAsc') selected @endif>Price-Lower To Higher</option>
                                        <option value="priceDesc"@if (!@empty($_GET['sortBy'])&& $_GET['sortBy']=='priceDesc') selected @endif>Price-Higher To Lower</option>
                                        <option value="titleAsc"@if (!@empty($_GET['sortBy'])&& $_GET['sortBy']=='titleAsc') selected @endif>Alphabetical Ascending</option>
                                        <option value="titleDesc"@if (!@empty($_GET['sortBy'])&& $_GET['sortBy']=='titleDesc') selected @endif>Alphabetical Descending</option>
                                        <option value="discAsc"@if (!@empty($_GET['sortBy'])&& $_GET['sortBy']=='discAsc') selected @endif>Discount-Lower To Higher</option>
                                        <option value="discDesc"@if (!@empty($_GET['sortBy'])&& $_GET['sortBy']=='discDesc') selected @endif>Discount-Higher To Lower</option>


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

                    @if (count($products)>0)


                        @foreach ( $products as $item)
                            
                       
                 
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product.detail',$item->slug)}}">
                                    <img class="default-img" src="{{$item->photo}}" alt="{{$item->photo}}">

                                    <span class="out-of-stock">{{$item->condition}}</span>

                                    {{--<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">--}}
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        
                                        <a title="Add to cart"  href="#" data-quantity="1" data-product-id="{{$item->id}} " class="add_to_cart" id="add_to_cart{{$item->id}}">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product.detail',$item->slug)}}">{{ucfirst($item->title)}}</a></h3>
                                <p>{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>

                                <div class="product-price">
                                    <span>${{number_format($item->offer_price,2)}} <small><del class="text-danger ">${{number_format($item->price,2)}}</del></small></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                        


                    @else

                    <p>no products found!!!</p>


                    @endif

                    
                      
                    </div>
                    {{$products->appends($_GET)->links()}} 
                </div>
            </div>
        </div>
    </div>
</section>
</form>

<!--/ End Product Style 1  -->	






@endsection


@section('scripts')

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


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
                    else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}
    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
@endpush

@endsection