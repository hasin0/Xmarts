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
                            <li class="active"><a href="blog-single.html">Shossp Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Single -->
    <section class="shop single section">
                <div class="container">
                    <div class="row"> 
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <!-- Product Slider -->
                                    <div class="product-gallery">
                                        <!-- Images slider -->
                                        <div class="flexslider-thumbnails">
                                            <ul class="slides">
                                                @php 
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <li data-thumb="{{$data}}" rel="adjustX:10, adjustY:">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- End Images slider -->
                                    </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="product-des">
                                        <!-- summary -->
                                        <div class="short">
                                            <h4>{{$product->title}}</h4>
                                            <div class="rating-main">
                                                <ul class="rating">
                                                    {{--@php
                                                        $rate=ceil($product->getReview->avg('rate'))
                                                    @endphp
                                                        @for($i=1; $i<=5; $i++)
                                                            @if($rate>=$i)
                                                                <li><i class="fa fa-star"></i></li>
                                                            @else 
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            @endif
                                                        @endfor--}}
                                                </ul>
                                                <a href="#" class="total-review">({{(\App\Models\ProductReview::where('product_id',$product->id)->count())}}) Review</a>
                                            </div>
                                            <p class="price"><span class="discount">${{$product->price}}</span><s>${{$product->offer_price}}</s> </p>
                                            <p class="summary">{{$product->summary}}</p>
                                        </div>
                                        <!--/ End summary -->
                                        <!-- Color -->
                                     {{-- <div class="color">
                                            <h4>Available Options <span>Color</span></h4>
                                            <ul>
                                                <li><a href="#" class="one"><i class="ti-check"></i></a></li>
                                                <li><a href="#" class="two"><i class="ti-check"></i></a></li>
   
                                        <li><a href="#" class="three"><i class="ti-check"></i></a></li>
                                                <li><a href="#" class="four"><i class="ti-check"></i></a></li>
                                            </ul>
                                        </div>--}} 
                                        <!--/ End Color -->
                                        <!-- Size -->
                                        @if($product->size)
                                        <div class="size mt-4">
                                            <h4>Size</h4>
                                            <ul>
                                                @php 
                                                    $sizes=explode(',',$product->size);
                                                    // dd($sizes);
                                                @endphp
                                                @foreach($sizes as $size)
                                                <li><a href="#" class="one">{{$size}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                        <!--/ End Size -->
                                        <!-- Product Buy -->
                                        <div class="product-buy">
                                            <div class="quantity">
                                                <h6>Quantity :</h6>
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
                                            <p class="cat">Category :<a href="#">Clothing</a></p>
                                            <p class="availability">Availability : 180 Products In Stock</p>
                                        </div>
                                        <!--/ End Product Buy -->
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-info">
                                        <div class="nav-main">
                                            <!-- Tab Nav -->
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
                                            </ul>
                                            <!--/ End Tab Nav -->
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <!-- Description Tab -->
                                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                                <div class="tab-single">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="single-des">
                                                                <p>{{$product->description}}</p>
                                                            </div>
                                                            
                                                                <h4>Product Features:</h4>
                                                                <ul>
                                                                    <li>long established fact.</li>
                                                                    <li>has a more-or-less normal distribution. </li>
                                                                    <li>lmany variations of passages of. </li>
                                                                    <li>generators on the Interne.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ End Description Tab -->
                                            <!-- Reviews Tab -->
                                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                <div class="tab-single review-panel">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            
                                                            <!-- Review -->
                                                            <div class="comment-review">
                                                                <div class="add-review">
                                                                    <h5>Add A Review</h5>
                                                                    <p>Your email address will not be published. Required fields are marked</p>
                                                                </div>
                                                                <h4>Your Rating <span class="text-danger">*</span></h4>
                                                                <div class="review-inner">
                                                                        <!-- Form -->
                                                            @auth
                                                            <form class="form" method="post" action="{{route('review.store',$product->slug)}}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-12">
                                                                        <div class="rating_box">
                                                                              <div class="star-rating">
                                                                                <div class="star-rating__wrap">
                                                                                  <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                                                                                  <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
                                                                                  <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                                                                                  <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
                                                                                  <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                                                                                  <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                                                                                  <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                                                                                  <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                                                                                  <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
                                                                                  <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
                                                                                  @error('rate')
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                  @enderror
                                                                                </div>
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                                                    <div class="col-lg-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Write a review</label>
                                                                            <textarea name="review" rows="6" placeholder="" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-12">
                                                                        <div class="form-group button5">	
                                                                            <button type="submit" class="btn">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            @else 
                                                            <p class="text-center p-5">
                                                                You need to <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register.form')}}">Register</a>

                                                            </p>
                                                            <!--/ End Form -->
                                                            @endauth
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="ratting-main">
                                                                <div class="avg-ratting">
                                                                    {{-- @php 
                                                                        $rate=0;
                                                                        foreach($product->rate as $key=>$rate){
                                                                            $rate +=$rate
                                                                       
                                                                    @endphp --}}
                                                                    <h4>{{ceil(\App\Models\ProductReview::where('product_id',$product->id)->avg('rate'))}} <span>(Overall)</span></h4>
                                                                     
                                                                    <span>Based on ({{(\App\Models\ProductReview::where('product_id',$product->id)->count())}}) Comments</span>
                                                                 
                                                                </div>

                                                                @php
                                                                    $review=\App\Models\ProductReview::where('product_id',$product->id)->latest()->paginate(1);
                                                                @endphp

                                                                @if(count($review))
                                                                    
                                                               
                                                                @foreach($review as $data)
                                                                <!-- Single Rating -->
                                                                <div class="single-rating">
                                                                    <div class="rating-author">
                                                                      {{--@php
                                                                           $data=\App\Models\User::where('id',$data->user_id)->value('photo')
                                                                        @endphp--}}
                                                                        @if($data)
                                                                        <p>{{\App\Models\User::where('id',$data->user_id)->value('photo')}}</p>

                                                                         {{--<img src="{{\App\Models\User::where('id',$data->user_id)->value('photo')}}" alt="{{\App\Models\User::where('id',$data->user->id)->value('photo')}}">--}}
                                                                        @else 
                                                                        <img src="{{asset('backend/img/avatar.png')}}" alt="Profile.jpg">
                                                                        @endif
                                                                    </div>
                                                                    <div class="rating-des">
                                                                      <h6>{{\App\Models\User::where('id',$data->user_id)->value('full_name')}}</h6>
                                                                        <div class="ratings">

                                                                            <ul class="rating">
                                                                                @for($i=1; $i<=5; $i++)
                                                                                    @if($data->rate>=$i)
                                                                                        <li><i class="fa fa-star"></i></li>
                                                                                    @else 
                                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                                    @endif
                                                                                @endfor
                                                                            </ul>
                                                                            <div class="rate-count">(<span>{{$data->rate}}</span>)</div>
                                                                        </div>
                                                                        <p>{{$data->review}}</p>
                                                                    </div>
                                                                </div>
                                                                <!--/ End Single Rating -->
                                                                 @endforeach
                                                                @endif

                                        
                                                                   
                                                            </div>
                                                            
                                                            <!--/ End Review -->
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ End Reviews Tab -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!--/ End Shop Single -->
    
    <!-- Start Most Popular -->
<div class="product-area most-popular related-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>


        
      
            
             
        <div class="row">


            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach ($product->rel_prods as $item )

                        @if(count($product->rel_prods)>0)

                        
                    <!-- Start Single Product -->

                            
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        @php
											$photo=explode(',',$item->photo);
									     @endphp

                                        <img class="default-img" src="{{$photo[0]}}" alt="{{$item->title}}">

                                        <span class="out-of-stock">{{$item->condition}}</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Add to cart</a>
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

                            

                            @endif
                         @endforeach
                    <!-- End Single Product -->
                  
                </div>
            </div>

        </div>



      
    </div>
</div>
<!-- End Most Popular Area -->

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
                                <!-- Images slider -->
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">

                                        @php 
										$photos=explode(',',$product->photo);
													// dd($photo);
										@endphp
                                          @foreach($photos as $photo)
                                        <li data-thumb="{{$photo}}"  rel="adjustX:10, adjustY:">
                                            <img src="{{$photo}}" alt="{{$photo}}">
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                <!-- End Images slider -->
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

@push('styles')
	<style>
		/* Rating */
		.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
		}

	</style>
@endpush
