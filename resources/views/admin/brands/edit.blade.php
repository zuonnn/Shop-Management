@extends('layouts.app')
@section('title', 'Edit Brand: ' . $brand->name)
@section('main')
    <div class="container">
        <form action="/admin/brands/{{$brand->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Brand Name</label>
                <input class="form-control" type="text" placeholder="Enter brand name" name="name" id="name" value="{{$brand->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
