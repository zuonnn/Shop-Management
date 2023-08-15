@extends('layouts.app')
@section('title','Detail of brand {{$brand->name}}')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$brand->name}}</h4>
    </div>
</div>
@endsection