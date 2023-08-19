<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (strlen($request->get('name'))==0)
            return redirect('brands')->with('error', 'Name is required');
        $brand = new Brand();
        $brand->name = $request->get('name');
        $brand->save();
        return redirect('/admin/brands')->with('success', 'Brand has been successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Lấy thông tin Brand
        $brand = Brand::findOrFail($id);

        // Lấy tất cả sản phẩm thuộc Brand này cùng với thông tin Category của chúng
        $products = Product::where('brand_id', $id)->with('category')->get();

        return view('admin.brands.show', compact('brand', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->get('name');
        $brand->save();
        return redirect('/admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/admin/brands');
    }
}
