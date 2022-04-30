<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Customer;
use App\Product;
use App\Pricing;
use Redirect;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order_products = OrderProduct::where('order_id', $order->id)->get();
            
            $products = [];
            $total_amount = 0;
            foreach ($order_products as $op) {
                $product = Product::find($op->product_id);
                $price = Pricing::where('product_id', $product->id)->first()->price;

                $total_amount += ($price * $op->quantity);

                array_push($products, $product->name);
            }
            
            $order->customer_name = Customer::find($order->customer_id)->fullname;
            $order->products = implode(', ', $products);
            $order->total_amount = $total_amount;
        }

        return view('order.index', ['orders' => $orders]);
    }


    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('order.create', ['customers' => $customers, 'products' => $products]);
    }

    public function customerProducts(Request $request)
    {
        $customers = Customer::all();
        
        $pricings = Pricing::where('customer_id', $request->customer_id)->get();
        $product_ids = [];
        foreach ($pricings as $pricing) {
            array_push($product_ids, $pricing->product_id);
        }

        $products = Product::whereIn('id', $product_ids)->get();
        return view('order.create', ['customer_id' => $request->customer_id, 'customers' => $customers, 'products' => $products]);
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
