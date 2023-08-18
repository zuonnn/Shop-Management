@extends('layouts.app')
@section('title','Create Product')
@section('main')
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
            <label for="email">Stock Quantity</label>
            <input class="form-control" type="text" placeholder="Enter product stock quantity" name="stock_quantity" id="stock_quantity">
        </div>
        <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id">
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
