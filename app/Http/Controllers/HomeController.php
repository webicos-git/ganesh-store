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

        $orders = Order::all();
        $total_payments = $this->getTotalPayments($orders);

        $orders_month = Order::whereMonth('created_at', date('m'))->get();
        $total_payments_month = $this->getTotalPayments($orders_month);

        $orders_year = Order::whereYear('created_at', date('Y'))->get();
        $total_payments_year = $this->getTotalPayments($orders_year);

        return view('home', [
            'groups' => $groups,
            'total_orders' => $total_orders, 
            'total_orders_today' => $total_orders_today, 
            'total_customers' => $total_customers,
            'total_products' => $total_products,
            'total_payments' => $total_payments,
            'total_payments_month' => $total_payments_month,
            'total_payments_year' => $total_payments_year
        ]);
    }

    public function getTotalPayments($orders)
    {
        $total_payments = 0;
        foreach ($orders as $order) {
            $order_products = OrderProduct::where('order_id', $order->id)->get();
            foreach ($order_products as $op) {
                $pricing = Pricing::where('product_id', $op->product_id)->where('customer_id', $order->customer_id)->first();
                if ($pricing) {
                    $total_payments += ($pricing->price * $op->quantity);
                }
            }
        }
        return $total_payments;
    }

    public function lang($locale){

        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
