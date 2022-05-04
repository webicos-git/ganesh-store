<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Group;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Pricing;
use App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $groups = Group::all();

        $total_orders = Order::all()->count();
        $total_orders_today = Order::wheredate('created_at', Today())->count();
        $total_customers = Customer::all()->count();
        $total_products = Product::all()->count();

        return view('home', [
            'groups' => $groups,
            'total_orders' => $total_orders, 
            'total_orders_today' => $total_orders_today, 
            'total_customers' => $total_customers,
            'total_products' => $total_products,
            'total_payments' => 0,
            'total_payments_month' => 0,
            'total_payments_year' => 0
        ]);
    }


    public function lang($locale){

        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
