@extends('layouts.app')

@section('title', 'Detail of category ' . $category->name)

@section('main')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Brand</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>{{ $product->brand->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
@endsection