<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', ['brands' => $brands, 'categories' => $categories]);
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
        $product->price = $request->get('price');
        $product->stock_quantity = $request->get('stock_quantity');
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
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
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->stock_quantity = $request->get('stock_quantity');
        $product->brand_id = $request->get('brand_id'); // Cập nhật brand_id
        $product->category_id = $request->get('category_id'); // Cập nhật category_id
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
