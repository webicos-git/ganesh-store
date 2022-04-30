@extends('layouts.master')

@section('title')
{{ 'Edit Customer' }}
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
                  <h6 class="m-0 font-weight-bold text-primary">{{ 'Edit Customer' }}</h6>
                </div>
                <div class="card-body">
                 <form method="post" action="{{ route('customer.update') }}">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('sentence.Full Name') }} <font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="fullname" value="{{ $customer->fullname }}" required> 
                        <input type="hidden" class="form-control" id="inputEmail3" name="id" value="{{ $customer->id }}">
                        {{ csrf_field() }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email" value="{{ $customer->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Phone') }} <font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="phone" value="{{ $customer->phone }}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Address') }} <font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="address" value="{{ $customer->address }}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Group <font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select name="group_id" class="form-control" id="inputPassword3" required>
                          <option disabled selected>~ Select a group ~</option>
                          @foreach ($groups as $group)
                            @if ($group->id === $customer->group_id)
                              <option selected value="{{$group->id}}">{{$group->name}}</option>
                              @continue  
                            @endif
                            <option value="{{$group->id}}">{{$group->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">GST Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="gst_number" value="{{ $customer->gst_number }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Opening Balance</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputPassword3" name="opening_balance" value="{{ $customer->opening_balance }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">As of Date</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" id="inputPassword3" name="as_of_date" value="{{ $customer->as_of_date }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="to_receive" checked="{{ $customer->to_receive ? 1 : 0 }}">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To receive</label>

                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="to_pay" checked="{{ $customer->to_pay  ? 1 : 0}}">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To pay</label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{ __('sentence.Save') }}</button>
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
