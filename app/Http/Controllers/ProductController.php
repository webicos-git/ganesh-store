<?php

namespace App\Http\Controllers;

use App\Product;
use Redirect;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }


    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->description = $request->description;

        $product->save();

        return Redirect::route('product.index')->with('success', 'Product Added Successfully');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->description = $request->description;

        $product->save();

        return Redirect::route('product.index')->with('success', 'Product Edited Successfully');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return Redirect::route('product.index')->with('success', 'Product Deleted Successfully');
    }
}
