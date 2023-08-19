@extends('layouts.app')
@section('title', 'Create Product')
@section('main')
    <div class="container">
        <h1>Create Product</h1>
        <form action="/admin/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" placeholder="Enter product name" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" placeholder="Enter product price" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="stock_quantity">Stock Quantity</label>
                <input class="form-control" type="text" placeholder="Enter product stock quantity" name="stock_quantity" id="stock_quantity">
            </div>
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id" id="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
