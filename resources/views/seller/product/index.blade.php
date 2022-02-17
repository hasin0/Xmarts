@extends('seller.layouts.master')
@section('title','E-SHOP || Product Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
       <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">brands
         List</h6>
      <a href="{{route('seller-product.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($products)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Is Featured</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Size</th>
              <th>Condition</th>
              <th>Brand</th>
              <th>Stock</th>
              <th>Photo</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($products as $product)
            @php
            $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->get();
            // dd($sub_cat_info);
            $brands=DB::table('brands')->select('title')->where('id',$product->brand_id)->get();
            @endphp
              <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->title}}</td>
                  <td>  {{$product->catergory}}% OFF</td>

               {{--   <td>{{$product->cat_info['title']}}
                    <sub>
                      @foreach($sub_cat_info as $data)
                        {{$data->title}}
                      @endforeach
                    </sub>
                  </td>--}}
                  <td>{{(($product->is_featured==1)? 'Yes': 'No')}}</td>
                  <td>Naira. {{$product->price}} </td>
                  <td>  {{$product->discount}}% OFF</td>
                  <td>{{$product->size}}</td>
                  <td>{{$product->condition}}</td>
                  <td>@foreach($brands as $brand) {{$brand->title}} @endforeach</td>
                  <td>
                    @if($product->stock>0)
                    <span class="badge badge-primary">{{$product->stock}}</span>
                    @else
                    <span class="badge badge-danger">{{$product->stock}}</span>
                    @endif
                  </td>
                  <td>
                      @if($product->photo)
                          @php
                            $photo=explode(',',$product->photo);
                            // dd($photo);
                          @endphp
                          <img src="{{$photo[0]}}" class="img-fluid zoom" style="max-width:80px" alt="{{$product->photo}}">
                      @else
                          <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                      @endif
                  </td>
                  <td>
                      @if($product->status=='active')
                          <span class="badge badge-success">{{$product->status}}</span>
                      @else
                          <span class="badge badge-warning">{{$product->status}}</span>
                      @endif
                  </td>
                  <td>
                      <a href="{{route('seller-product.edit',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"  data-placement="bottom"><i class="fas fa-edit"></i></a>
                      <a href="javascripts:void(0);" data-toggle="modal" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-target="#productID{{$product->id}}" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>

                  <form method="POST" action="{{route('seller-product.destroy',[$product->id])}}">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$product->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                      </form>
                  </td>
                  {{-- Delete Modal --}}

            <div class="modal fade" id="productID{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="productID{{$product->id}}Label" aria-hidden="true">
              <div class="modal-dialog">
                @php
                $product=\App\Models\Product::where('id',$product->id)->first();
                @endphp
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="productID{{$product->id}}Label">{{$product->title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-6">

                        <strong>Summary:</strong>
                        <p>{!! html_entity_decode($product->summary)!!}</p>
                      </div>
                     </div>

                     <div class="row">
                      <div class="col-md-6">


                    <strong>Description:</strong>
                    <p>{!! html_entity_decode($product->description)!!}</p>
                      </div>
                     </div>

                     <div class="row">
                      <div class="col-md-4">

                        <strong>Price:</strong>
                        <p>${{number_format($product->price)}}</p>
                      </div>
                     </div>

                     <div class="row">
                      <div class="col-md-4">

                        <strong>Offer price</strong>
                        <p>${{number_format($product->offer_price,2)}}</p>
                      </div>
                     </div>

                     <div class="row">
                      <div class="col-md-4">

                        <strong>Discount</strong>
                        <p>{{number_format($product->discount)}}%</p>
                      </div>
                     </div>

                     <div class="row">
                      <div class="col-md-6">

                        <strong>Catergory:</strong>
                        <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
                      </div>
                     </div>


                     <div class="row">
                      <div class="col-md-6">

                        <strong>Child Catergory:</strong>
                        <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                      </div>
                     </div>



                     <div class="row">
                      <div class="col-md-6">

                        <strong>Brands:</strong>
                        <p>@foreach($brands as $brand) {{$brand->title}} @endforeach</p>
                        {{--<p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>--}}
                      </div>
                     </div>


                     <div class="row">
                      <div class="col-md-6">

                        <strong>Size</strong>
                        <p>{{$product->size}}</p>
                      </div>
                     </div>




                     <div class="row">
                      <div class="col-md-6">

                        <strong>Vendor:</strong>
                        <p>{{\App\Models\User::where('id',$product->vendor_id)->value('full_name')}}</p>
                      </div>
                     </div>


                     <div class="row">
                      <div class="col-md-6">

                        <strong>condition</strong>
                        <p>{{$product->condition}}</p>
                      </div>
                     </div>











                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              </tr>
          @endforeach
          </tbody>
        </table>
       {{-- <span style="float:right">{{$brands
        ->links()}}</span>--}}
        @else
          <h6 class="text-center">No brands
             found!!! Please create brands</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4,5]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
