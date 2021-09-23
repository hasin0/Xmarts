 @extends('backend.layouts.master')
@section('title','E-SHOP || Banner Page')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add User</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">fullName</label>
        <input id="inputTitle" type="text" name="full_name" placeholder="Enter name"  value="{{old('full_name')}}" class="form-control">
        @error('fullName')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">username</label>
        <input id="inputTitle" type="text" name="username" placeholder="username"  value="{{old('username')}}" class="form-control">
        @error('username')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="inputaddress" class="col-form-label">Address</label>
        <input id="inputaddress" type="address" name="address" placeholder="Enter Address"  value="{{old('address')}}" class="form-control">
        @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

        <div class="form-group">
          <label for="inputphone" class="col-form-label">phone</label>
        <input id="inputphone" type="number" name="phone" placeholder="phone"  value="{{old('phone')}}" class="form-control">
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Password</label>
          <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{old('password')}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      {{--  @php 
        $roles=DB::table('users')->select('role')->get();
        @endphp--}}
        <div class="form-group">
            <label for="role" class="col-form-label">Role</label>
            <select name="role" class="form-control">
                <option value="">-----Select Role-----</option>
                 {{-- @foreach($roles as $role)--}}
                    <option value="admin" {{old('role')=='admin' ? 'selected' : ''}}>Admin</option>
                    <option value="customer" {{old('role')=='customer' ? 'selected' : ''}}>customer</option>
                    <option value="vendor" {{old('role')=='vendor' ? 'selected' : ''}}>vendor</option>

               {{-- @endforeach--}}
            </select>
          @error('role')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush