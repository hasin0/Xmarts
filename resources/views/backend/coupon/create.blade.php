@extends('backend.layouts.master')

@section('title','E-SHOP || coupon Create')

@section('main-content')

<div class="card">

    <div class="col-md-12">
        @if ($errors->any())

        <div class="alert alert-danger">
         <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>

              
          @endforeach
        </ul>
      </div> 
        @endif

    </div>
    <h5 class="card-header">Add coupon</h5>
    <div class="card-body">
      <form method="post" action="{{route('coupon.store')}}">
          @csrf

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="code" placeholder="Enter Code"  value="{{old('code')}}" class="form-control">
        @error('Code')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>


           
        <div class="form-group">
          <label for="inputTitle" class="col-form-label"> Coupon Value <span class="text-danger">*</span></label>
        <input id="inputTitle" type="number" name="value" placeholder="Enter value"  value="{{old('value')}}" class="form-control">
        @error('value')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

     



        <div class="form-group">
          <label for="type" class="col-form-label">Coupon Type <span class="text-danger">*</span></label>
          <select name="type" class="form-control">
              <option value="fixed">Fixed</option>
              <option value="percent">Percent</option>
          </select>
          @error('Type')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>







        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush