<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Pricing;
use Redirect;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index()
    {
        $customers = Customer::all();
        foreach ($customers as $customer) {
            $customer->group_name = Group::find($customer->group_id)->name;
        }
        return view('customer.index', ['customers' => $customers]);
    }

    public function create()
    {
        $groups = Group::all();
        return view('customer.create', ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'group_id' => 'required'
        ]);

        $customer = new Customer();
        $customer->fullname = $request->fullname;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->group_id = $request->group_id;
        $customer->email = $request->email;
        $customer->gst_number = $request->gst_number;
        $customer->opening_balance = $request->opening_balance;
        $customer->as_of_date = $request->as_of_date;
        $customer->customer_type = $request->customer_type;

        $customer->save();

        return Redirect::route('customer.index')->with('success', 'Customer Added Successfully');
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $orders = Order::where('customer_id', $id)->get();
        $pricings = Pricing::where('customer_id', $id)->get();
        
        $customer->group_name = Group::find($customer->group_id)->name;

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

        foreach ($pricings as $pricing) {
            $pricing->customer_name = Customer::find($pricing->customer_id)->fullname;
            $pricing->product_name = Product::find($pricing->product_id)->name;
        }

        return view('customer.view', ['customer' => $customer, 'orders' => $orders, 'pricings' => $pricings]);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $groups = Group::all();
        return view('customer.edit', ['customer' => $customer, 'groups' => $groups]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'group_id' => 'required'
        ]);

        $customer = Customer::find($request->id);
        $customer->fullname = $request->fullname;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->group_id = $request->group_id;
        $customer->email = $request->email;
        $customer->gst_number = $request->gst_number;
        $customer->opening_balance = $request->opening_balance;
        $customer->as_of_date = $request->as_of_date;
        $customer->customer_type = $request->customer_type;

        $customer->save();

        return Redirect::route('customer.index')->with('success', 'Customer Edited Successfully');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return Redirect::route('customer.index')->with('success', 'Customer Deleted Successfully');
    }
}
