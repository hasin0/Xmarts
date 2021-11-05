@extends('frontend.user.layouts.master')

@section('main-content')
<div class="container-fluid">
   @include('frontend.user.layouts.notification')
    <!-- Page Heading -->
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Address</h6>
      <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        {{--billing shipping--}}
        <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
           
              <th>Billing Address</th>
             
    
            
              <th>Action</th>
            </tr>


            
          </thead>


          
         
          <tbody>
        
                <tr>

                  <td>{{$users->address}}</td>
                 
                  <td>
                    <a href="{{route('users.edit',$users->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <a href="javascripts:void(0);" data-toggle="modal" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-target="#userID{{$users->id}}" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>                  <div class="modal fade" id="userID{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="productID{{$users->id}}Label" aria-hidden="true">
                  </td>

                  
                    
            <form action="{{route('billing.address',$users->id)}} " method="POST">
                   
                  <div class="modal fade" id="userID{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="productID{{$users->id}}Label" aria-hidden="true">

                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            <strong>photo:</strong>
                           {{-- <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->photo}}">--}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
    
    
                           
    
                            
                           
        
                           
        
        
                          
        
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </form>
                </tr>  

          </tbody>
        </table>

               {{--shipping address--}}

        <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
           
            
              <th>Shipping Address</th>
    
            
              <th>Action</th>
            </tr>


            
          </thead>


          
         
          <tbody>
        
                <tr>

                  <td>{{$users->address}}</td>
                
                  <td><a href="{{route('users.edit',$users->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <a href="javascripts:void(0);" data-toggle="modal" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-target="#userID{{$users->id}}" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                  </td>

                  
                    
    
                   
                    <div class="modal fade" id="#" tabindex="-1" role="dialog" aria-labelledby="#Label" aria-hidden="true">{{--<div class="modal fade" id="userID{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="productID{{$user->id}}Label" aria-hidden="true">--}}

                    <div class="modal-dialog">
                        {{-- @php
                        $user=\App\Models\Product::where('id',$user->id)->first();
                        @endphp --}} 
                        <div class="modal-content">
                          <div class="modal-header">
                            <strong>photo:</strong>
                           {{-- <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->photo}}">--}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
    
    
                           
    
                            
                           
        
                           
        
        
                          
        
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </tr>  

          </tbody>
        </table>

        
      </div>
    </div>
</div>
@endsection

