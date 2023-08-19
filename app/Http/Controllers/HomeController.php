<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $sellers = Seller::all();
        return view('seller.index', ['sellers' => $sellers],
        [
            'title' => 'Selling Page'
        ],
        );
    }
}
