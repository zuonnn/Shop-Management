@extends('layouts.app')
@section('title','List Seller')
@section('main')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Birthday</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
            <tr>
                <td>{{ $seller->name }}</td>
                <td>{{ $seller->phone }}</td>
                <td>{{ $seller->email }}</td>
                <td>{{ $seller->address }}</td>
                <td>{{ $seller->birthday }}</td>
                <td>{{ $seller->user->username }}</td>
                <td>Password hidden for security</td>
                <td class="action-button">
                    <a href="sellers/{{$seller->id}}" class="btn btn-info">Show</a>
                    <a href="sellers/{{$seller->id}}/edit" class="btn btn-primary">Edit</a>
                    <a>
                        <form action="sellers/{{$seller->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@endsection