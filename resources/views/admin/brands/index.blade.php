@extends('layouts.app')
@section('title', 'List Brands')
@section('main')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td class="action-button">
                        <a href="brands/{{$brand->id}}" class="btn btn-info">Show</a>
                        <a href="brands/{{$brand->id}}/edit" class="btn btn-primary">Edit</a>
                        <form action="brands/{{$brand->id}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
