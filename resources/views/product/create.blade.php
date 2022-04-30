@extends('layouts.master')

@section('title')
{{ 'Add Test' }}
@endsection

@section('content')
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
   <div class="col-md-8">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
         </div>
         <div class="card-body">
            <form method="post" action="{{ route('product.create') }}">
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name <font color="red">*</font></label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputEmail3" name="name" required>
                     {{ csrf_field() }}
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Product Code <font color="red">*</font></label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputPassword3" name="product_code" required maxlength="3">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Product Unit</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputPassword3" name="unit">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Product Description</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputPassword3" name="description">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-9">
                     <button type="submit" class="btn btn-primary">Add Product</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('header')

@endsection

@section('footer')

@endsection