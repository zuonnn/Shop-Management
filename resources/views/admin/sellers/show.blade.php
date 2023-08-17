@extends('layouts.app')
@section('title','Detail of seller {{$seller->name}}')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Full name: {{$seller->name}}</h4>
        <br><br>
        <p class="card-text">Phone: {{ $seller->phone }}</p>
        <p class="card-text">Email: {{ $seller->email }}</p>
        <p class="card-text">Birthday: {{ $seller->birthday }}</p>
        <p class="card-text">Address: {{$seller->address}}</p>
        <p class="card-text">Username: {{ $seller->username }}</p>
        <p class="card-text">Password: {{ $seller->password }}</p>
    </div>
</div>
@endsection