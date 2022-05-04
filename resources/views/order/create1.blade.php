@extends('layouts.master')

@section('title')
    {{ 'New Order' }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Order</h6>
                </div>
                <div class="card-body">
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
                    <form method="post" action="{{ route('order.store1') }}">
                        <div class="form-group row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1"
                                    name="customer_id" aria-hidden="true">
                                    <option disabled selected>~ Select a Customer ~</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                                    @endforeach
                                </select>
                                {{ csrf_field() }}
                            </div>
                            <div class="col-2"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-2"></div>

                            <div class="col-8">
                                <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1"
                                    name="status" aria-hidden="true">
                                    <option disabled>~ Set Order Status ~</option>
                                    <option selected value="Completed">Completed</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-2"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
