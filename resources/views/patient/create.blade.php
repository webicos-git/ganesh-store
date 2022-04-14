@extends('layouts.master')

@section('title')
{{ __('sentence.New Patient') }}
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
                  <h6 class="m-0 font-weight-bold text-primary">New Customer</h6>
                </div>
                <div class="card-body">
                 <form method="post" action="{{ route('patient.create') }}">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('sentence.Full Name') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name">
                        {{ csrf_field() }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Phone') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputPassword3" name="phone">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Address') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="adress">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Group<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <!-- <input type="select" class="form-control" id="inputPassword3" name="group"> -->
                        <select name="group" class="form-control" id="inputPassword3">
                          <option value=""> Select</option>
                          <option value="mora"> Mora</option>
                          <option value="uran"> Uran</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">GST Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="gstnumber">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Opening Balance</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputPassword3" name="openingbalance">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">As of Date</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" id="inputPassword3" name="asofdate">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="torecieve">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To recieve</label>

                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="topay">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To pay</label>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Add Customer</button>
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
