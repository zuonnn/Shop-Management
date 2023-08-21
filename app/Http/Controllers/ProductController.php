<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\CodeCoverage\NoCodeCoverageDriverWithPathCoverageSupportAvailableException;

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
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('public/images');
            $product->image = str_replace('public/', '/upload/', $product->image);
        }
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
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('public/images');
            $product->image = str_replace('public/', '/upload/', $product->image);
        }
        $product->brand_id = $request->get('brand_id');
        $product->category_id = $request->get('category_id');
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

    public function search(Request $request)
    {
        $search_text = $_POST['query'];
        $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->with('category')->get();
        // echo($products);
        
        return view('seller.product',['products' => $products]);
    }

    public function addProduct(Request $request)
{
    // Retrieve the product data from the request (assuming you're submitting a form)
    $productId = $request->input('id');
    $productName = $request->input('name');
    $quantity = $request->input('quantity');
    $price = $request->input('price');

    // Create an array to store the product data
    $product = [
        'id' => $productId,
        'name' => $productName,
        'quantity' => $quantity,
        'price' => $price,
    ];

    // Add the product data to the session
    $products = session('products', []);
    $products[] = $product;
    session(['products' => $products]);

    // Calculate the total price of products in the session
    $totalPrice = 0;
    foreach ($products as $p) {
        $totalPrice += $p['price'] * $p['quantity'];
    }

    
    $totalAmountPaid = $request->input('total-amount-paid'); 

    // Calculate the total amount to be returned
    $totalAmountToBeReturned = $totalAmountPaid - $totalPrice;
    
    // Store the total price and total amount to be returned in the session
    session(['total_price' => $totalPrice]);
    session(['total_amount_to_be_returned' => $totalAmountToBeReturned]);

    // You can also flash a message to indicate that the product was added successfully
    session()->flash('success_message', 'Product added to session successfully.');

    // Redirect back to the 'seller' route (adjust this route as needed)
    return Redirect::route('seller');
}

    
    

    public function deleteProduct($productId)
    {
        // Retrieve the products from the session
        $products = session('products', []);
    
        // Find the index of the product with the given ID
        $productIndex = array_search($productId, array_column($products, 'id'));
    
        // Check if the product with the given ID was found
        if ($productIndex !== false) {
            // Remove the product from the array
            array_splice($products, $productIndex, 1);
    
            // Update the session data
            session(['products' => $products]);
    
            // Optionally, you can flash a message to indicate successful deletion
            session()->flash('success_message', 'Product deleted successfully.');
        }
    
        // Redirect back to the previous page or wherever you like
        return Redirect::route('seller');
    }
    

}
