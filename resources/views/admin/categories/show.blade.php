@extends('layouts.app')
@section('title','Detail of category {{$category->name}}')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$category->name}}</h4>
    </div>
</div>
@endsection