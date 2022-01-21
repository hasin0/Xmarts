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
                            <li class="active"><a href="blog-single.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="post" action="{{route('checkout3.store')}}">
                   @csrf
                        <div class="row"> 

                            @php
                                $name=explode(' ',auth()->user()->full_name);
                            @endphp
                            <div class="col-lg-8 col-12">
                                <div class="checkout-form">
                                  
                                    
                                    <!-- Form -->
                                        <div class="row">
                                            
                                            

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="checkbox">
                                                    <input name="payment_method"  required  value="cod" id="customCheck2" type="checkbox">
                
                                                <label class="checkbox-inline" for="customCheck2"><h6>CASH ON DELIVERY</h6></label>
                                                    
                                                </div>
                                                
                                            </div>
                                            



                                            {{--<div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Card NUmber<span>*</span></label>
                                                    <input type="number" name="card_number" id="card_number"  placeholder="" required="required" value="">
                                                </div>
                                            </div>--}}



                                           
                                         
               
                                            </div>
                                            
   
                                        </div>
                                        
                                    <!--/ End Form -->
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="order-details">



                                    <div class="single-widget get-button">
                                        <div class="content">
                                            <div class="button" type>
                                            <button type="submit" class="btn">proceeds to checkout</button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <!-- Order Widget -->
                                   {{-- <div class="single-widget">
                                        <h2>CART  TOTALS</h2>
                                        <div class="content">
                                            <ul>
                                                <li>Sub Total<span>$330.00</span></li>
                                                <li>(+) Shipping<span>$10.00</span></li>
                                                <li class="last">Total<span>$340.00</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/ End Order Widget -->
                                    <!-- Order Widget -->
                                    <div class="single-widget">
                                        <h2>Payments</h2>
                                        <div class="content">
                                            <div class="checkbox">
                                                <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
                                                <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
                                                <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Order Widget -->
                                    <!-- Payment Method Widget -->
                                    <div class="single-widget payement">
                                        <div class="content">
                                            <img src="images/payment-method.png" alt="#">
                                        </div>
                                    </div>
                                    <!--/ End Payment Method Widget -->
                                    <!-- Button Widget -->
                                    --}}
                                    <!--/ End Button Widget -->
                                </div>
                            </div>

                           



                        </form>

                        </div>
       
    </div>
    </section>



    <!--/ End Checkout -->
    
    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
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
    <!-- End Shop Services -->
    
    <!-- Start Shop Newsletter  -->
   

@endsection

@section('scripts')

<script>
    $('#customCheck1').on('change',function (e) {
        e.preventDefault();
        if (this.checked) {

            $('#sfirst_name').val($('#first_name').val());
            $('#slast_name').val($('#last_name').val());
            $('#semail').val($('#email').val());
            $('#sphone').val($('#phone').val());
            $('#scountry').val($('#country').val());
            $('#scity').val($('#city').val());
            $('#spostcode').val($('#postcode').val());
            $('#sstate').val($('#state').val());
            $('#saddress').val($('#address').val());
           




          
            
        }
        else{

            $('#sfirst_name').val("");
            $('#slast_name').val("");
            $('#semail').val("");
            $('#sphone').val("");
            $('#scountry').val("");
            $('#scity').val("");
            $('#spostcode').val("");
            $('#sstate').val("");
            $('#saddress').val("");








        }
        
    })
</script>

@endsection