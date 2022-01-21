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
                            <li class="active"><a href="blog-single.html">Shiping</a></li>
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
            <form action="{{route('checkout2.store')}}" method="post">

                @csrf

                <div class="table-responsive">
                    @if(count($shippings)>0)
                    <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <th>S.N.</th>
                         <th>Address</th>
                         <th>Price</th>
                         <th>Delivery-Time</th>
                         <th>Status</th>
                         <th>Choose</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>S.N.</th>
                          <th>Address</th>
                          <th>Price</th>
                          <th>Delivery-Time</th>
                          <th>Status</th>
                          <th>Choose</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach($shippings as $key=>$shipping)   
                            <tr>
                                <td>{{$shipping->id}}</td>
                                <td>{{$shipping->shipping_address}}</td>
                                <td>${{number_format($shipping->delivery_charge)}}</td>
                                <td>{{$shipping->delivery_time}}</td>
               
                                <td>
                                    @if($shipping->status=='active')
                                        <span class="badge badge-success">{{$shipping->status}}</span>
                                    @else
                                        <span class="badge badge-warning">{{$shipping->status}}</span>
                                    @endif
                                </td>
    
    
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required id="customRadio{{$key}}"value="{{$shipping->delivery_charge}}" name="delivery_charge" class="custom-control">
                                        <label for="customRadio{{$key}}"  class="custom-control-label"></label>
    
                                    </div>
                                </td>
    
                                {{--<td>
                                    <a href="{{route('shipping.edit',$shipping->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{route('shipping.destroy',[$shipping->id])}}">
                                      @csrf 
                                      @method('delete')
                                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$shipping->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>--}}
                                {{-- Delete Modal --}}
                                {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form method="post" action="{{ route('banners.destroy',$user->id) }}">
                                            @csrf 
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                </div> --}}
                            </tr>  
                        @endforeach
                      </tbody>
                    </table>
                    {{--<span style="float:right">{{$shippings->links()}}</span>--}}
                    @else
                      <h6 class="text-center">No shippings found!!! Please create shipping</h6>
                    @endif
                  </div>
                  <div class="content">
                    <div class="button" type>
                        <button type="submit" class="btn"><a href="{{route('checkout1')}}">GO back</a></button>

                        
                    <button type="submit" class="btn">proceed to checkout</button>
                    </div>
                </div>
             </form>

            
         
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