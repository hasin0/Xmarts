@extends('frontend.pages.user.layouts.master')

@section('main-content')
<div class="container-fluid">
   @include('frontend.pages.user.layouts.notification')
    <!-- Page Heading -->
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Address</h6>
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

                  <td>
                    <address>
                      Address:{{$users->address}}<br>
                      Country:{{$users->country}}<br>
                      State:{{$users->state}}<br>
                      City:{{$users->city}}<br>
                      Postalcode:{{$users->postcode}}<br>








                    </address>
                    
                    
                    
                  </td>
                 
                  <td>
                    <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#editAddress">Edit address</a>
                   
                           {{--billing shipping--}}

                    <div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="productID{{$users->id}}Label" aria-hidden="true"  >

                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="examplem=Modal">Edit Address</h5>
                             {{-- <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->photo}}">--}}
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('billing.address',$users->id)}}" method="POST">
                              @csrf
                            <div class="modal-body">

                             


                            

                                 
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> Address</label>
                        <textarea name="address" id=""  class="form-control">{{$users->address}}</textarea>
                        @error('address')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>





                                
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> Country</label>
                      <input id="inputTitle" type="text" name="country" placeholder="Enter country"  value="{{$users->country}}" class="form-control">
                      @error('country')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>




                                 
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> city</label>
                      <input id="inputTitle" type="text" name="city" placeholder="Enter city"  value="{{$users->city}}" class="form-control">
                      @error('city')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>





                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> Postal Code</label>
                      <input id="inputTitle" type="number" name="postcode" placeholder="Enter postcode"  value="{{$users->postcode}}" class="form-control">
                      @error('postcode')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>


                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> State</label>
                      <input id="inputTitle" type="text" name="state" placeholder="Enter state"  value="{{$users->state}}" class="form-control">
                      @error('state')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
  
                    {{--<a href="{{route('users.edit',$users->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>--}}
                  </td>

                  
                    
            
                  
                
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

                  <td>
                    <address>
                      Address:{{$users->saddress}}<br>
                      Country:{{$users->scountry}}<br>
                      State:{{$users->sstate}}<br>
                      City:{{$users->scity}}<br>
                      Postalcode:{{$users->spostcode}}<br>
                    </address>
                    
                    
                    
                  </td>                
                  <td>


                    <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#editSAddress">Edit  address</a>
                   
                           {{--Shipping shipping--}}

                    <div class="modal fade" id="editSAddress" tabindex="-1" role="dialog" aria-labelledby="productID{{$users->id}}Label" aria-hidden="true"  >

                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="examplem=Modal">Edit Shipping Address</h5>
                             {{-- <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->photo}}">--}}
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('shipping.address',$users->id)}}" method="POST">
                              @csrf
                              <div class="modal-body">

                             


                            

                                 
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> Shipping Address</label>
                        <textarea name="saddress" id=""  class="form-control">{{$users->saddress}}</textarea>
                        @error('address')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>





                                
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Shipping Country</label>
                      <input id="inputTitle" type="text" name="scountry" placeholder="Enter country"  value="{{$users->scountry}}" class="form-control">
                      @error('country')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>




                                 
                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> Shipping city</label>
                      <input id="inputTitle" type="text" name="scity" placeholder="Enter city"  value="{{$users->scity}}" class="form-control">
                      @error('city')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>





                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label"> Shipping Postal Code</label>
                      <input id="inputTitle" type="number" name="spostcode" placeholder="Enter postcode"  value="{{$users->spostcode}}" class="form-control">
                      @error('postcode')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>


                      <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Shipping State</label>
                      <input id="inputTitle" type="text" name="sstate" placeholder="Enter state"  value="{{$users->sstate}}" class="form-control">
                      @error('state')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
  
                    {{--<a href="{{route('users.edit',$users->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>--}}
                    



                  </td>

                  
                    
    
                   

                   
                </tr>  

          </tbody>
        </table>

        
      </div>
    </div>
</div>
@endsection

