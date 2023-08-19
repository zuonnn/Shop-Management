@extends('layouts.app')
@section('title', 'Detail of seller ' . $seller->name)
@section('main')
<div class="container">
    <h1>Detail of Seller: {{ $seller->name }}</h1>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Full Name</h4>
            <p class="card-text">{{ $seller->name }}</p>
            <hr>
            <h4 class="card-title">Contact Information</h4>
            <p class="card-text">Phone: {{ $seller->phone }}</p>
            <p class="card-text">Email: {{ $seller->email }}</p>
            <hr>
            <h4 class="card-title">Personal Information</h4>
            <p class="card-text">Birthday: {{ $seller->birthday }}</p>
            <p class="card-text">Address: {{ $seller->address }}</p>
            <hr>
            <h4 class="card-title">User Account</h4>
            <p class="card-text">Username: {{ $seller->user->username }}</p>
            <p class="card-text">Password: Password hidden for security</p>
        </div>
    </div>
</div>
@endsection
