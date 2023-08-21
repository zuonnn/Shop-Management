@extends('layouts.app')
@section('title', 'Create Seller')
@section('main')
    <div class="container">
        <form action="/admin/sellers" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" placeholder="Enter seller name" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" placeholder="Enter seller phone" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" placeholder="Enter seller email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" placeholder="Enter seller address" name="address" id="address" cols="30"
                    rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input class="form-control" type="date" placeholder="Enter seller birthday" name="birthday" id="birthday">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" placeholder="Enter seller username" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" placeholder="Enter seller password" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
