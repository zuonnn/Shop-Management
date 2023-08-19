@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sellers' Income</h1>
        <form action="/admin/home" method="post">
            @csrf
            <div class="form-group">
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="seller_id">Select Seller:</label>
                <select id="seller_id" name="seller_id">
                    <option value="">All Sellers</option>
                    @foreach($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        
        @foreach($seller->orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#orderDetails{{ $order->id }}">View Details</button>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div id="orderDetails{{ $order->id }}" class="collapse">
                        @if($order->orderDetails && count($order->orderDetails) > 0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $orderDetail)
                                        <tr>
                                            <td>{{ $orderDetail->product->name }}</td>
                                            <td>{{ $orderDetail->quantity }}</td>
                                        </tr>
                                        <!-- Hiển thị thông tin orderDetails khác tại đây -->
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No order details available for this order.</p>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </div>
@endsection
