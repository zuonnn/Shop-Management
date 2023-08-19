@extends('layouts.app')
@section('title', 'Detail of Category ' . $category->name)
@section('main')
<div class="container">
    <h1>Detail of Category: {{ $category->name }}</h1>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category Name</h4>
            <p class="card-text">{{ $category->name }}</p>
        </div>
    </div>
</div>
@endsection
