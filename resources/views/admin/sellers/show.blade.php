@extends('layouts.app')
@section('title','Detail of seller {{$seller->name}}')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$seller->name}}</h4>
        <p class="card-text">{{$seller->address}}</p>
        <p class="card-text">{{ $seller->phone }}</p>
        <p class="card-text">{{ $seller->email }}</p>
        <p class="card-text">{{ $seller->birthday }}</p>
        <p class="card-text">{{ $seller->address }}</p>
        <p class="card-text">{{ $seller->username }}</p>
        <p class="card-text">{{ $seller->password }}</p>
    </div>
</div>
@endsection