@extends('layouts.master')

@section('title')
    {{ __('sentence.Dashboard') }}
@endsection

@section('content')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_appointments_today->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today's Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_appointments }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total customers</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_patients_today }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Groups</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_patients }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_prescriptions }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{ __('sentence.Total Payments') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_payments }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-wallet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                {{ __('sentence.Payments this month') }}</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">₹ {{ $total_payments_month }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                {{ __('sentence.Payments this year') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₹ {{ $total_payments_year }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">Report Generation</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control" type="date" name="date" value="">
                        </div>
                        <div class="col-3">
                            <select name="group_id" class="form-control" id="inputPassword3" required>
                                <option disabled selected>Select a group</option>
                                <option value="mora">Mora</option>
                                <option value="mora">uran</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-success"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- EDIT Appointment Modal-->
    <div class="modal fade" id="EDITRDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ __('sentence.You are about to modify an appointment') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>{{ __('sentence.Patient') }} :</b> <span id="patient_name"></span></p>
                    <p><b>{{ __('sentence.Date') }} :</b> <span id="rdv_date"></span></p>
                    <p><b>{{ __('sentence.Time Slot') }} :</b> <span id="rdv_time"></span></p>
                    <p><b>{{ __('sentence.Time Slot') }} :</b> <span id="rdv_time"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button"
                        data-dismiss="modal">{{ __('sentence.Close') }}</button>
                    <a class="btn btn-primary text-white"
                        onclick="event.preventDefault(); document.getElementById('rdv-form-confirm').submit();">{{ __('sentence.Confirm Appointment') }}</a>
                    <form id="rdv-form-confirm" action="{{ route('appointment.store_edit') }}" method="POST"
                        class="d-none">
                        <input type="hidden" name="rdv_id" id="rdv_id">
                        <input type="hidden" name="rdv_status" value="1">
                        @csrf
                    </form>
                    <a class="btn btn-primary text-white"
                        onclick="event.preventDefault(); document.getElementById('rdv-form-cancel').submit();">{{ __('sentence.Cancel Appointment') }}</a>
                    <form id="rdv-form-cancel" action="{{ route('appointment.store_edit') }}" method="POST"
                        class="d-none">
                        <input type="hidden" name="rdv_id" id="rdv_id2">
                        <input type="hidden" name="rdv_status" value="2">
                        @csrf
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
