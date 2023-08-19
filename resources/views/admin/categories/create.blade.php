@extends('layouts.app')
@section('title', 'Create Category')
@section('main')
    <div class="container">
        <h1>Create Category</h1>
        <form action="/admin/categories" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input class="form-control" type="text" placeholder="Enter category name" name="name" id="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
