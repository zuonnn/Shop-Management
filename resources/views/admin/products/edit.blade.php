@extends('layouts.app')
@section('title', 'Edit Product: '. $product->name)
@section('main')
    <div class="container">
        <form action="/admin/products/{{$product->id}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" placeholder="Enter product name" name="name" id="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" placeholder="Enter product price" name="price" id="price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="stock_quantity">Stock Quantity</label>
                <input class="form-control" type="text" placeholder="Enter product stock quantity" name="stock_quantity" id="stock_quantity" value="{{$product->stock_quantity}}">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id" id="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected @endif>{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label><br>
                <img src="{{ asset($product->image) }}" class="image" alt="Product Image" style="width: 200px; height: 200px">
                <input type="file" placeholder="Enter product image" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
