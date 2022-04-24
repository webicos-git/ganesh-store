@extends('layouts.master')

@section('title')
{{ 'All Orders' }}
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
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ 'All Orders' }}</h6>
         </div>
         <div class="col-4">
            <a href="{{ route('order.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> {{ 'New Order' }}</a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>Id</th>
                  <th class="text-center">{{ 'Customer' }}</th>
                  <th class="text-center">{{ 'Product' }}</th>
                  <th class="text-center">{{ 'Quantity' }}</th>
                  <th class="text-center">{{ 'Status' }}</th>
                  <th class="text-center">{{ 'Actions' }}</th>
               </tr>
            </thead>
            <tbody>
               @foreach($orders as $order)
               <tr>
                  <td>{{ $order->id }}</td>
                  <td><a href="{{ url('customer/show/'.$order->customer_id) }}"> {{ $order->customer_name }} </a></td>
                  <td><a href="{{ url('product/show/'.$order->product_id) }}"> {{ $order->product_name }} </a></td>
                  <td>{{ $order->quantity }}</td>
                  <td>{{ $order->status }}</td>
                  <td class="text-center">
                     <a href="{{ url('order/delete/'.$order->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection