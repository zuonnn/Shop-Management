@extends('layouts.app')
@section('title','Edit Brand')
@section('main')
    <form action="/admin/{{$brand->id}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">brand Name</label>
            <input class="form-control" type="text" placeholder="Enter brand name" name="name" id="name" value="{{$brand->id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
