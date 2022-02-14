@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">Order Edit</h5>
  <div class="card-body">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="condition">condition :</label>
        <select name="condition" id="" class="form-control">
          <option value="">--Select condition--</option>
          <option value="new" {{(($order->condition=='pending')? 'selected' : '')}}>New</option>
          <option value="process" {{(($order->condition=='processing')? 'selected' : '')}}>process</option>
          <option value="delivered" {{(($order->condition=='delivered')? 'selected' : '')}}>Delivered</option>
          <option value="cancel" {{(($order->condition=='cancel')? 'selected' : '')}}>Cancel</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
