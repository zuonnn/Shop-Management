<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (strlen($request->get('name'))==0)
            return redirect('products')->with('error', 'Name is required');
        $product = new Product();
        $product->name = $request->get('name');
        $product->phone = $request->get('phone');
        $product->email = $request->get('email');
        $product->address = $request->get('address');
        $product->birthday = $request->get('birthday');
        $product->username = $request->get('username');
        $product->password = $request->get('password');
        $product->save();
        return redirect('/admin/products')->with('success', 'Product has been successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->phone = $request->get('phone');
        $product->email = $request->get('email');
        $product->address = $request->get('address');
        $product->phone = $request->get('birthday');
        // $product->username = $request->get('username');
        // $product->password = $request->get('password');
        $product->save();
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products');
    }
}
