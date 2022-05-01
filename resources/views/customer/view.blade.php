@extends('layouts.master')

@section('title')
    {{ $customer->name }}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <center><img src="{{ asset('img/patient-icon.png') }}"
                                    class="img-profile rounded-circle img-fluid"></center>
                            <h4 class="text-center"><b>{{ $customer->name }}</b></h4>
                            <hr>
                            @isset($customer->email)
                                <p><b>{{ 'Email' }} :</b> {{ $customer->email }}</p>
                            @endisset

                            @isset($customer->phone)
                                <p><b>{{ __('sentence.Phone') }} :</b> {{ $customer->phone }}</p>
                            @endisset

                            @isset($customer->address)
                                <p><b>{{ __('sentence.Address') }} :</b> {{ $customer->address }}</p>
                            @endisset
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pricings-tab" data-toggle="tab" href="#pricings"
                                        role="tab" aria-controls="pricings-tab" aria-selected="false">Pricings</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                                        aria-controls="orders-tab" aria-selected="false">Orders</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="pricings" role="tabpanel" aria-labelledby="pricings-tab">
                                    <table class="table" style="text-align: center">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">{{ 'Product' }}</th>
                                            <th class="text-center">{{ 'Price' }}</th>
                                            <th class="text-center">{{ 'Actions' }}</th>
                                        </tr>
                                        @isset($pricings)
                                            @forelse($pricings as $key => $pricing)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $pricing->product_name }}</td>
                                                    <td>{{ $pricing->price }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ url('pricing/delete/' . $pricing->id) }}"
                                                            class="btn btn-danger btn-circle btn-sm"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" align="center">No pricings available</td>
                                                </tr>
                                            @endforelse
                                        @endisset
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <table class="table" style="text-align: center">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">{{ 'Products' }}</th>
                                            <th class="text-center">{{ 'Total Amount' }}</th>
                                            <th class="text-center">{{ 'Status' }}</th>
                                            <th class="text-center">{{ 'Actions' }}</th>
                                        </tr>
                                        @isset($orders)
                                            @forelse($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $order->products }}</td>
                                                    <td>{{ $order->total_amount }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ url('order/delete/' . $order->id) }}"
                                                            class="btn btn-danger btn-circle btn-sm"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" align="center">No orders placed</td>
                                                </tr>
                                            @endforelse
                                        @endisset
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('footer')
@endsection
