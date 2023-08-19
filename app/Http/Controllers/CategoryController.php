<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (strlen($request->get('name'))==0)
            return redirect('categories')->with('error', 'Name is required');
        $categorie = new Category();
        $categorie->name = $request->get('name');
        $categorie->save();
        return redirect('/admin/categories')->with('success', 'categorie has been successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Lấy thông tin Category
        $category = Category::findOrFail($id);

        // Lấy tất cả sản phẩm thuộc Category này cùng với thông tin Brand của chúng
        $products = Product::where('category_id', $id)->with('category')->get();

        return view('admin.categories.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Category::find($id);
        return view('admin.categories.edit', ['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Category::find($id);
        $categorie->name = $request->get('name');
        $categorie->save();
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Category::find($id);
        $categorie->delete();
        return redirect('/admin/categories');
    }
}

