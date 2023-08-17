@extends('layouts.app')
@section('title','List Category')
@section('main')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection