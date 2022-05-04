@extends('layouts.master')

@section('title')
    {{ 'New Order' }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Order - Product List</h6>
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
                    <form method="post" action="{{ route('order.store2') }}">
                        <div class="col-md-12">
                            <input type="hidden" name="order_id" value="{{ $order_id }}">
                            @csrf
                            <fieldset class="test_labels">
                                <div class="repeatable"></div>
                                <div class="form-group">
                                    <a type="button" class="btn btn-success add text-white" align="center"><i
                                            class='fa fa-plus'></i>
                                        Add Product
                                    </a>
                                </div>
                            </fieldset>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/template" id="test_labels">
        <section>
          <div class="row">
             <div class="col-md-6">
                <select class="form-control select2 select2-hidden-accessible" name="product_id[]" id="test" tabindex="-1" aria-hidden="true">
                   <option disabled selected>~ Select a Product ~</option>
                   @foreach ($products as $product)
                       <option value="{{ $product->id }}">{{ $product->name }}</option>
                   @endforeach
                </select>
             </div>
             
             <div class="col-md-6">
                <div class="form-group-custom">
                      <input type="text" id="strength" name="quantity[]"  class="form-control" placeholder="Quantity">
                </div>
             </div>
          </div>
       </section>
       <hr color="#a1f1d4">
    </script>
@endsection
