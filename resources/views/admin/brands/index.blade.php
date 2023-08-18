@extends('layouts.app')
@section('title','List brand')
@section('main')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection