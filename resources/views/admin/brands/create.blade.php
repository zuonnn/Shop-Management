@extends('layouts.app')
@section('title', 'Create Brand')
@section('main')
    <div class="container">
        <h1>Create Brand</h1>
        <form action="/admin/brands" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Brand Name</label>
                <input class="form-control" type="text" placeholder="Enter brand name" name="name" id="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
