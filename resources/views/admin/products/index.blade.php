@extends('layouts.app')
@section('title', 'List Products')
@section('main')
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Stock Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price }}</td>
                            <td><a href="/admin/brands/{{ $product->brand->id }}">{{ $product->brand->name }}</a></td>
                            <td><a href="/admin/categories/{{ $product->category->id }}">{{ $product->category->name }}</a></td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td class="action-button">
                                <a href="products/{{$product->id}}" class="btn btn-info">Show</a>
                                <a href="products/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
                                <form action="products/{{$product->id}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
