@extends('backend.layouts.master')

@section('title','E-SHOP || Banner Create')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Shipping</h5>
    <div class="card-body">
      <form method="post" action="{{route('shipping.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Address <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="shipping_address" placeholder="Enter Address"  value="{{old('shipping_address')}}" class="form-control">
        @error('shipping_address')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">Delivery-Price <span class="text-danger">*</span></label>
        <input id="delivery_charge" type="number" name="delivery_charge" placeholder="Enter price"  step="any" value="{{old('delivery_charge')}}" class="form-control">
        @error('delivery_charge')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>


        <div class="form-group">
          <label for="time" class="col-form-label">Delivery-Time <span class="text-danger">*</span></label>
        <input id="delivery_time" type="text" name="delivery_time" step="any"  placeholder="Enter price"  value="{{old('delivery_time')}}" class="form-control">
        @error('delivery_time')
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
</div

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