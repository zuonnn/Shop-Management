@extends('layouts.app')
@section('title', 'Detail of Brand ' . $brand->name)
@section('main')
<div class="container">
    <h1>Detail of Brand: {{ $brand->name }}</h1>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Brand Name</h4>
            <p class="card-text">{{ $brand->name }}</p>
        </div>
    </div>
</div>
@endsection
