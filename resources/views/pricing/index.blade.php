@extends('layouts.master')

@section('title')
    {{ 'All Pricings' }}
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
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ 'All Pricings' }}</h6>
                </div>
                <div class="col-4">
                    <a href="{{ route('pricing.create') }}" class="btn btn-primary float-right"><i
                            class="fa fa-plus"></i> {{ 'New Pricing' }}</a>
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
                            <th class="text-center">{{ 'Price' }}</th>
                            <th class="text-center">{{ 'Actions' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pricings as $pricing)
                            <tr>
                                <td>{{ $pricing->id }}</td>
                                <td><a href="{{ url('customer/show/' . $pricing->customer_id) }}">
                                        {{ $pricing->customer_name }} </a></td>
                                <td>{{ $pricing->product_name }}</td>
                                <td>{{ $pricing->price }}</td>
                                <td class="text-center">
                                    <a href="{{ url('pricing/edit/' . $pricing->id) }}"
                                        class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                                    <a href="{{ url('pricing/delete/' . $pricing->id) }}"
                                        class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
