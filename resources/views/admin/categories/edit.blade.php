@extends('layouts.app')
@section('title', 'Edit Category')
@section('main')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="/admin/{{$category->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input class="form-control" type="text" placeholder="Enter category name" name="name" id="name" value="{{$category->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
