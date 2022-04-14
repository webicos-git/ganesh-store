@extends('layouts.master')

@section('title')
{{ __('sentence.All Tests') }}
@endsection

@section('content')
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
<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">All Products</h6>
         </div>
         <div class="col-4">
            <a href="{{ route('test.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Product</a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Unit</th>
                  <th>Product Description</th>
                  <th class="text-center">{{ __('sentence.Actions') }}</th>
               </tr>
            </thead>
            <tbody>
               @foreach($tests as $test)
               <tr>
                  <td>{{ $test->id }}</td>
                  <td>{{ $test->test_name }}</td>
                  <td> {{ $test->comment }} </td>
                  <td class="text-center">
                     <a href="{{ url('test/edit/'.$test->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                     <a href="{{ url('test/delete/'.$test->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection