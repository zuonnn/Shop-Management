@extends('layouts.app')
@section('title', 'Detail of product {{$product->name}}')
@section('main')
    <div class="container">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <p class="card-text">Price: ${{$product->price}}</p>
                <p class="card-text">Stock Quantity: {{$product->stock_quantity}}</p>
                <p class="card-text">Category: {{$product->category->name}}</p>
                <p class="card-text">Brand: {{$product->brand->name}}</p>
            </div>
        </div>
    </div>
@endsection
