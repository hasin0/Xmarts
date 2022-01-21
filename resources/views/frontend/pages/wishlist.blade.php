@extends('frontend.layouts.master')

@section('content')


<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Wishlist</a></li>
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
        <div class="row">
            <div class="col-12" id="wishlist_list">
                <!-- Shopping Summery -->
                @include('frontend.layouts._wishlist')
                <!--/ End Shopping Summery -->
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

@endsection


@section('scripts')

<script>
 $('.move-to-cart') .on('click',function (e){
     e.preventDefault();
     var rowId=$(this).data('id');
    // alert(rowId);
    var token="{{csrf_token()}}";
    var path="{{route('wishlist.move.cart')}}";

    $.ajax({
        url:path,
        type:"POST",
        data:{
            _token:token,
            rowId:rowId,
        },
        beforeSend:function(){
            $(this).html('<i class="fas fa-spinner fa-spin"></i>Moving to  cart')
        },

        success:function(data){

            if(data['status']){
                
                $('body #cart_counter').html(data['cart_count']); 
                $('body #wishlist_list').html(data['wishlist_list']); 
                $('body #header-ajax').html(data['header']); 

                swal({
                    title: " success!",
                    text: data['message'],
                    icon: "success",
                    button: "OK",
               });

 

            }
            else {

                    swal({
                                title: " oops!",
                                text: data['message'],
                                icon: "sometin went wrong",
                                button: "OK",
                        });

                }





        }
        //error:function(err){
          //  swal({
              //          title: " Error!",
              //          text: "sometin went wrong",
               //         icon: "error",
               //         button: "OK",
               // });
       


    })

 })

</script>






<script>
    $(document).on('click','.delete_wishlist',function (e){
        e.preventDefault();
        var rowId=$(this).data('id');
       // alert(rowId);
       var token="{{csrf_token()}}";
       var path="{{route('wishlist.delete')}}";
   
       $.ajax({
           url:path,
           type:"POST",
           data:{
               _token:token,
               rowId:rowId,
           },
           
           success:function(data){
   
               if(data['status']){
                   
                   $('body #cart_counter').html(data['cart_count']); 
                   $('body #wishlist_list').html(data['wishlist_list']); 
                   $('body #header-ajax').html(data['header']); 
   
                   swal({
                       title: " success!",
                       text: data['message'],
                       icon: "success",
                       button: "OK",
                  });
   
    
   
               }
               else {
   
                       swal({
                                   title: " oops!",
                                   text: data['message'],
                                   icon: "sometin went wrong",
                                   button: "OK",
                           });
   
                   }
   
   
   
   
   
           }
           //error:function(err){
             //  swal({
                 //          title: " Error!",
                 //          text: "sometin went wrong",
                  //         icon: "error",
                  //         button: "OK",
                  // });
          
   
   
       })
   
    })
   
   </script>

@endsection




    