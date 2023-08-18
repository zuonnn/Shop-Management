@extends('layouts.app')
@section('title','Update seller')
@section('main')
    <form action="/admin/sellers/{{$seller->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" placeholder="Enter seller name" name="name" id="name" value="{{$seller->name}}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input class="form-control" type="text" placeholder="Enter seller phone" name="phone" id="phone" value="{{$seller->phone}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" placeholder="Enter seller email" name="email" id="email" value="{{$seller->email}}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" placeholder="Enter seller address" name="address" id="address" cols="30"
                rows="10">{{$seller->address}}</textarea>
        </div>
        <div class="form-group">
            <label for="phone">Birthday</label>
            <input class="form-control" type="birthday" placeholder="Enter seller birthday" name="birthday" id="birthday" value="{{$seller->birthday}}">
        </div>
        <div class="form-group">
            <label for="phone">Username</label>
            <input disabled class="form-control" type="text" placeholder="Enter seller username" name="username" id="username" value="{{$seller->user->username}}">
        </div>
        <div class="form-group">
            <label for="phone">Password</label>
            <input class="form-control" type="text" placeholder="Enter seller password" name="password" id="password" value="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
