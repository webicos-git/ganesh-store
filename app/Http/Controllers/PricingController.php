<?php

namespace App\Http\Controllers;

use App\Pricing;
use App\Customer;
use App\Product;
use Redirect;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pricings = Pricing::all();

        foreach ($pricings as $pricing) {
            $pricing->customer_name = Customer::find($pricing->customer_id)->fullname;
            $pricing->product_name = Product::find($pricing->product_id)->name;
        }

        return view('pricing.index', ['pricings' => $pricings]);
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('pricing.create', ['customers' => $customers, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'product_id.*' => 'required',
            'price.*' => 'required'
        ]);

        $count = count($request->product_id);

        for ($i = 0; $i < $count; $i++) {
            $pricing = Pricing::where('customer_id', $request->customer_id)
                            ->where('product_id', $request->product_id[$i])
                            ->get();

            if ($pricing->count() === 0) {
                $pricing = new Pricing();
            } else {
                $pricing = $pricing[0];
            }
            
            $pricing->customer_id = $request->customer_id;
            $pricing->product_id = $request->product_id[$i];
            $pricing->price = $request->price[$i];
            
            $pricing->save();
        }


        return Redirect::route('pricing.index')->with('success', 'Pricing Added Successfully');
    }

    public function show(Pricing $pricing)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        Pricing::destroy($id);
        return Redirect::route('pricing.index')->with('success', 'Pricing Deleted Successfully');
    }
}
