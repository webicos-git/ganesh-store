<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Customer;
use App\Product;
use Redirect;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $orders = OrderProduct::all();
        foreach ($orders as $order) {
            $actual_order = Order::find($order->order_id);
            $order->customer_id = $actual_order->customer_id;
            $order->status = $actual_order->status;

            $order->customer_name = Customer::find($actual_order->customer_id)->fullname;
            $order->product_name = Product::find($order->product_id)->name;
        }

        return view('order.index', ['orders' => $orders]);
    }


    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('order.create', ['customers' => $customers, 'products' => $products]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'status' => 'required',
            'product_id.*' => 'required',
            'quantity.*' => 'required'
        ]);

        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->status = $request->status;
        $order->save();

        $count = count($request->product_id);
        for ($i = 0; $i < $count; $i++) { 
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $request->product_id[$i];
            $order_product->quantity = $request->quantity[$i];

            $order_product->save();
        }
        return Redirect::route('order.index')->with('success', 'Order Added Successfully');
    }

    public function show(Order $order)
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
        Order::destroy($id);
        return Redirect::route('order.index')->with('success', 'Order Deleted Successfully');
    }
}
