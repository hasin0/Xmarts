@extends('backend.layouts.master')
@section('title','E-SHOP || Banner Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
       <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">User
         List</h6>
      <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add User</a>
    </div>
   
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>S.N.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Photo</th>
          <th>Join Date</th>
          <th>Role</th>
          <th>phone</th>
          <th>address</th>

          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Join Date</th>
            <th>Role</th>
            <th>phone</th>
          <th>address</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
      </tfoot>
      <tbody>
        @foreach($users as $user)   
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->full_name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->photo)
                        <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->photo}}">
                    @else
                        <img src="{{asset('backend/img/avatar.png')}}" class="img-fluid rounded-circle" style="max-width:50px" alt="avatar.png">
                    @endif
                </td>
                <td>{{(($user->created_at)? $user->created_at->diffForHumans() : '')}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>

                <td>
                    @if($user->status=='active')
                        <span class="badge badge-success">{{$user->status}}</span>
                    @else
                        <span class="badge badge-warning">{{$user->status}}</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <a href="javascripts:void(0);" data-toggle="modal" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-target="#userID{{$user->id}}" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>

                <form method="POST" action="{{route('users.destroy',[$user->id])}}">
                  @csrf 
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$user->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                <div class="modal fade" id="userID{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="productID{{$user->id}}Label" aria-hidden="true">
                <div class="modal-dialog">
                    {{-- @php
                    $user=\App\Models\Product::where('id',$user->id)->first();
                    @endphp --}} 
                    <div class="modal-content">
                      <div class="modal-header">
                        <strong>photo:</strong>
                        <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->photo}}">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">


                         
                        <div class="row">
                          <div class="col-md-6">
    
                            <strong>Name:</strong>

                            <h5 class="modal-title" id="userID{{$user->id}}Label">{{$user->full_name}}</h5>

                           
                          </div>
                         </div>
                     
    
                        <div class="row">
                          <div class="col-md-6">
    
                            <strong>email:</strong>
                            <p>{{$user->email}}</p>
                          </div>
                         </div>
    
                         <div class="row">
                          <div class="col-md-6">
    
                         
                        <strong>address:</strong>
                        <p>{{$user->address}}</p>
                          </div>
                         </div>
    
                         <div class="row">
                          <div class="col-md-4">
    
                            <strong>phone:</strong>
                            <p>{{$user->phone}}</p>
                          </div>
                         </div>
    
                      
    
    
    
    
    
    
    
                         
                         <div class="row">
                          <div class="col-md-6">
    
                            <strong>Role:</strong>
                            <p>{{$user->role}}</p>
                          </div>
                         </div>
    
                         
                        
    
                     
                         <div class="row">
                          <div class="col-md-6">
    
                            <strong>status:</strong>
                            <p>{{$user->status}}</p>
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
    <span style="float:right">{{$users->links()}}</span>
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