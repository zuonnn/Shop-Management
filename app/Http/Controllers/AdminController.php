<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Lấy ngày mặc định hoặc ngày được chọn từ form
        $defaultDate = $request->input('date', Carbon::now()->toDateString());
        // Lấy danh sách các seller
        $sellers = Seller::all();

        // Tính toán tổng thu nhập cho mỗi seller
        
        foreach ($sellers as $seller) {
            // Truy vấn đơn hàng của seller với điều kiện lọc theo ngày và seller (nếu đã chọn)
            $query = Order::where('seller_id', $seller->id)
                ->whereDate('order_date', $defaultDate);
            $orders = $query->get();
            $totalOrders = count($orders);
            $totalIncome = 0;
            // Tính tổng giá trị các đơn hàng
            foreach ($orders as $order) {
                $totalIncome += $order->total_price;
            }
            $seller->totalOrders = $totalOrders;
            $seller->orderDate = $defaultDate;
            $seller->totalIncome = $totalIncome;
        }

        // Tính tổng thu nhập theo ngày, tháng và năm
        $totalIncomeToday = Order::whereDate('order_date', $defaultDate)->sum('total_price');
        $totalIncomeThisMonth = Order::whereYear('order_date', Carbon::now()->year)
            ->whereMonth('order_date', Carbon::now()->month)
            ->sum('total_price');
        $totalIncomeThisYear = Order::whereYear('order_date', Carbon::now()->year)->sum('total_price');

        return view('admin.home', [
            'sellers' => $sellers,
            'defaultDate' => $defaultDate,
            'totalIncomeToday' => $totalIncomeToday,
            'totalIncomeThisMonth' => $totalIncomeThisMonth,
            'totalIncomeThisYear' => $totalIncomeThisYear,
        ]);
    }
}
