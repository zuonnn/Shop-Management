<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $sellerId = $request->input('seller_id');

        $query = Seller::query();

        if ($sellerId) {
            $query->where('id', $sellerId);
        }

        $sellers = $query->get();

        // Dựa vào $sellers, truy vấn cơ sở dữ liệu để lấy thông tin thu nhập và order của seller trong khoảng thời gian đã chọn.

        return view('admin.home', compact('sellers'),[
            'title' => 'Admin Page'
        ]);
    }

}
