@extends('layouts.master')
@section('title')
{{ 'New Order' }}
@endsection

@section('content')
<form method="post" action="{{ route('order.store') }}">
   <div class="row">
      <div class="col">
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
         @endif
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Select Customer</h6>
            </div>
            <div class="card-body">
               <div class="form-group text-center">
                  <img src="{{ asset('img/patient-icon.png') }}" class="img-profile rounded-circle img-fluid">
               </div>
               <div class="form-group">
                  <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1" name="customer_id" aria-hidden="true">
                     <option disabled selected>~ Select a Customer ~</option>
                     @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                     @endforeach
                  </select>
                  {{ csrf_field() }}
               </div>
               
               <div class="form-group">
                  <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1" name="status" aria-hidden="true">
                     <option disabled >~ Set Order Status ~</option>
                     <option selected value="Completed">Completed</option>
                     <option value="Pending">Pending</option>
                  </select>
               </div>

               <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-warning" align="center">
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
            </div>
            <div class="card-body">
               <fieldset class="test_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> Add Product</a>
                  </div>
               </fieldset>
            </div>
         </div>
      </div>
   </div>
</form>
@endsection

@section('footer')
<script type="text/template" id="test_labels">
   <section>
      <div class="row">
         <div class="col-md-6">
            <select class="form-control select2 select2-hidden-accessible" name="product_id[]" id="test" tabindex="-1" aria-hidden="true">
               <option disabled selected>~ Select a Product ~</option>
               @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->name }}</option>
               @endforeach
            </select>
         </div>
         
         <div class="col-md-6">
            <div class="form-group-custom">
                  <input type="text" id="strength" name="quantity[]"  class="form-control" placeholder="Quantity">
            </div>
         </div>
      </div>
   </section>
   <hr color="#a1f1d4">
</script>
@endsection