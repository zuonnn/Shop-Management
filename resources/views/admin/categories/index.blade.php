@extends('layouts.app')
@section('title', 'List Categories')
@section('main')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="action-button">
                        <a href="categories/{{$category->id}}" class="btn btn-info">Show</a>
                        <a href="categories/{{$category->id}}/edit" class="btn btn-primary">Edit</a>
                        <form action="categories/{{$category->id}}" method="POST" class="d-inline">
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
