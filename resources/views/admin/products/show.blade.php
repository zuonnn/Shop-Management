@extends('layouts.app')
@section('title','Detail of product {{$product->name}}')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$product->name}}</h4>
        <p class="card-text">{{$product->price}}</p>
        <p class="card-text">{{ $product->stock_quantity }}</p>
        <p class="card-text">{{ $product->category->name }}</p>
        <p class="card-text">{{ $product->brand->name }}</p>
    </div>
</div>
@endsection