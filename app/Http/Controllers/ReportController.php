<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Pricing;

use Illuminate\Http\Request;
use Redirect;
use DB;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReportData($group_id = null, $date = null)
    {
        $products = Product::all();
        if ($group_id) {
            $customers = Customer::where('group_id', $group_id)->get();
        } else {
            $customers = Customer::all();
        }

        $groups = Group::all();

        foreach ($products as $product) {
            $product->total_quantity = 0;

            foreach ($customers as $customer) {
                if ($date) {
                    $orders = Order::where('customer_id', $customer->id)->wheredate('created_at', $date)->get();
                } else {
                    $orders = Order::where('customer_id', $customer->id)->get();
                }
                $order_ids = [];

                foreach ($orders as $order) {
                    array_push($order_ids, $order->id);
                }
                $order_products_by_order_id = OrderProduct::whereIn('order_id', $order_ids);
                $order_products_by_product_id = $order_products_by_order_id->where('product_id', $product->id)->get();

                $total_quantity = 0;
                foreach ($order_products_by_product_id as $op) {
                    $total_quantity += $op->quantity;
                }
                $product[$customer->id] = $total_quantity;

                $customer->total_price = 0;
                foreach ($products as $p) {
                    $pricing = Pricing::where('customer_id', $customer->id)->where('product_id', $p->id)->first();
                    if ($pricing) {
                        $customer->total_price += ($pricing->price * $p[$customer->id]);
                    }
                }

                $product->total_quantity += $total_quantity;
            }
        }

        $total_price = 0;
        foreach ($customers as $c) {
            $total_price += $c->total_price;
        }

        return [
            'products' => $products,
            'customers' => $customers,
            'groups' => $groups,
            'group_id' => $group_id,
            'date' => $date,
            'total_price' => $total_price
        ];
    }

    public function index()
    {
        $report_data = $this->getReportData();
        return view('report.index', [
            'products' => $report_data['products'],
            'customers' => $report_data['customers'],
            'groups' => $report_data['groups'],
            'group_id' => $report_data['group_id'],
            'total_price' => $report_data['total_price'],
        ]);
    }

    public function filter(Request $request)
    {
        $report_data = $this->getReportData($request->group_id);
        return view('report.index', [
            'products' => $report_data['products'],
            'customers' => $report_data['customers'],
            'groups' => $report_data['groups'],
            'group_id' => $report_data['group_id'],
            'total_price' => $report_data['total_price'],
        ]);
    }
    
    public function pdf($id = null)
    {
        $report_data = $this->getReportData($id);

        $group_name = 'NA';
        if ($id) {
            $group_name = Group::find($id)->name;
        }

        $date = $report_data['date'] ? $report_data['date'] : today();
        // return view('report.pdf', [
        //     'products' => $report_data['products'],
        //     'customers' => $report_data['customers'],
        //     'groups' => $report_data['groups'],
        //     'group_id' => $report_data['group_id'],
        //     'group_name' => $group_name,
        //     'date' => $date,
        //     'total_price' => $report_data['total_price'],
        // ]);

        $pdf = PDF::loadView('report.pdf', [
            'products' => $report_data['products'],
            'customers' => $report_data['customers'],
            'groups' => $report_data['groups'],
            'group_id' => $report_data['group_id'],
            'group_name' => $group_name,
            'date' => $date,
            'total_price' => $report_data['total_price'],
        ])->setPaper('a4', 'landscape');

        $date = $date->format('d-m-Y');
        return $pdf->download($date . $group_name . '.pdf');
    }

    public function homePdf(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'group_id' => 'required'
        ]);
        $report_data = $this->getReportData($request->group_id, $request->date);
        $group_name = Group::find($request->group_id)->name;

        // return view('report.pdf', [
        //     'products' => $report_data['products'],
        //     'customers' => $report_data['customers'],
        //     'groups' => $report_data['groups'],
        //     'group_id' => $report_data['group_id'],
        //     'group_name' => $group_name,
        // ]);

        $pdf = PDF::loadView('report.pdf', [
            'products' => $report_data['products'],
            'customers' => $report_data['customers'],
            'groups' => $report_data['groups'],
            'group_id' => $report_data['group_id'],
            'group_name' => $group_name,
            'date' => $report_data['date'],
            'total_price' => $report_data['total_price'],
        ])->setPaper('a4', 'landscape');

        return $pdf->download($request->date . $group_name . '.pdf');
    }
}
