@extends('layouts.app')
@section('title', 'Finance')
@section('main')

<!-- Các card để hiển thị tổng thu nhập theo ngày, tháng và năm -->
<div style="display: flex; justify-content: space-between; margin-top: 20px;">
    <div style="flex-basis: calc(33.33% - 20px); background-color: #f0f0f0; border: 1px solid #ccc; padding: 20px; text-align: center;">
        <h2 style="font-size: 1.5rem; margin-bottom: 10px;">Total Income Today</h2>
        <p style="font-size: 1.2rem; font-weight: bold;">{{ $totalIncomeToday }}</p>
    </div>
    <div style="flex-basis: calc(33.33% - 20px); background-color: #f0f0f0; border: 1px solid #ccc; padding: 20px; text-align: center;">
        <h2 style="font-size: 1.5rem; margin-bottom: 10px;">Total Income This Month</h2>
        <p style="font-size: 1.2rem; font-weight: bold;">{{ $totalIncomeThisMonth }}</p>
    </div>
    <div style="flex-basis: calc(33.33% - 20px); background-color: #f0f0f0; border: 1px solid #ccc; padding: 20px; text-align: center;">
        <h2 style="font-size: 1.5rem; margin-bottom: 10px;">Total Income This Year</h2>
        <p style="font-size: 1.2rem; font-weight: bold;">{{ $totalIncomeThisYear }}</p>
    </div>
</div>

<!-- Form để lọc theo ngày -->
<form action="/admin/home" method="post" style="margin: 20px 0;">
    @csrf
    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 10px;">
        <label for="date" style="margin-right: 10px;">Select Date:</label>
        <input type="date" id="date" name="date" value="{{ $defaultDate }}">
    </div>
    <div style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Filter</button>
    </div>
</form>

<!-- Bảng hiển thị thu nhập -->
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">Seller</th>
            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">Total Order</th>
            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">Date</th>
            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">Total Income</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sellers as $seller)
            <tr>
                <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">{{ $seller->name }}</td>
                <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">{{ $seller->totalOrders }}</td>
                <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">{{ $seller->orderDate }}</td>
                <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">{{ $seller->totalIncome }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
