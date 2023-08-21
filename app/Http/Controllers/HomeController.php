<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = session('products', []);
        $totalPrice = session('total_price', 0); // Default to 0 if it's not in the session.
    
        // Retrieve any success message from the session
        $successMessage = session('success_message');
    
        // Pass the session data, including 'total_price', to the 'index' view
        return view('seller.index', [
            'products' => $products,
            'totalPrice' => $totalPrice,
            'successMessage' => $successMessage,
        ]);
    }
    

    
}
