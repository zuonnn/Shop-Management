@extends('layouts.app')
@section('title','Edit category')
@section('main')
    <form action="/admin/{{$category->id}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">category Name</label>
            <input class="form-control" type="text" placeholder="Enter category name" name="name" id="name" value="{{$category->id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
