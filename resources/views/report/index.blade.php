@extends('layouts.master')

@section('title')
    {{ 'Report Generation' }}
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
                <div class="col-2">
                    <h6 class="m-0 font-weight-bold text-primary p-2">{{ 'Report Generation' }}</h6>
                </div>
                <div class="col-2">
                    <a 
                        href="{{ url('reports/pdf/' . $group_id) }}"
                        class="m-0 btn btn-primary btn-circle"><i class="fas fa-print"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h6 class="m-0 font-weight-bold text-primary">{{ 'Filters' }}</h6>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('report.filter') }}">
                        <div class="row">

                            <div class="col-3">
                                <select name="group_id" class="form-control">
                                    <option selected disabled>~ Select a Group ~</option>

                                    @foreach ($groups as $group)
                                        @isset($group_id)
                                            @if ($group->id == $group_id)
                                                <option selected value="{{ $group->id }}">{{ $group->name }}</option>
                                                @continue
                                            @endif
                                        @endisset
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach

                                </select>
                                {{ csrf_field() }}
                            </div>

                            <div class="col-1">
                                <button type="submit" class="form-control btn btn-sm btn-primary">
                                    Search
                                </button>
                            </div>
                            <div class="col-1">
                                <a class="form-control btn btn-sm btn-danger" href="{{ route('report.index') }}">
                                    Reset
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            @foreach ($products as $product)
                                <th>{{ $product->product_code }}</th>
                            @endforeach
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td><b>{{ $customer->fullname }}</b></td>
                                @foreach ($products as $product)
                                    <td>{{ $product[$customer->id] }}</td>
                                @endforeach
                                <td><b>{{ $customer->total_price }}</b></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><b>Total</b></td>
                            @foreach ($products as $product)
                                <td><b>{{ $product->total_quantity }}</b></td>
                            @endforeach
                            <td>{{ $total_price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
