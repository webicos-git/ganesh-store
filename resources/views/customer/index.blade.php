@extends('layouts.master')

@section('title')
    {{ 'All Customers' }}
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
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">All Customers</h6>
                </div>
                <div class="col-4">
                    <a href="{{ route('customer.create') }}" class="btn btn-primary float-right"><i
                            class="fa fa-plus"></i>New Customer</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">{{ __('sentence.Phone') }}</th>
                            <th class="text-center">Group</th>
                            <th class="text-center">GST Number</th>
                            <th class="text-center">Opening Balance</th>
                            <th class="text-center">As of Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td><a href="{{ url('customer/show/' . $customer->id) }}"> {{ $customer->fullname }} </a>
                                </td>
                                <td class="text-center"> {{ $customer->phone }} </td>
                                <td class="text-center"> {{ $customer->group_name }} </td>
                                <td class="text-center"> {{ $customer->gst_number }} </td>
                                <td class="text-center"> {{ $customer->opening_balance }} </td>
                                <td class="text-center">{{ $customer->as_of_date }}</td>
                                <td class="text-center">
                                    <a href="{{ url('customer/show/' . $customer->id) }}"
                                        class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('customer/edit/' . $customer->id) }}"
                                        class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
