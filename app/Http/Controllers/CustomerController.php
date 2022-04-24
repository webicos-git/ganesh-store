<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
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
        $customer->to_receive = $request->to_receive ? 1 : 0;
        $customer->to_pay = $request->to_pay ? 1 : 0;

        $customer->save();

        return Redirect::route('customer.index')->with('success', 'Customer Added Successfully');
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customer.view', ['customer' => $customer]);
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
        $customer->to_receive = $request->to_receive ? 1 : 0;
        $customer->to_pay = $request->to_pay ? 1 : 0;

        $customer->save();

        return Redirect::route('customer.index')->with('success', 'Customer Edited Successfully');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return Redirect::route('customer.index')->with('success', 'Customer Deleted Successfully');
    }
}
