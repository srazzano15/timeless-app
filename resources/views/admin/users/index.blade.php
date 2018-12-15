@extends('layouts.admin')



@section('content')
    <div class="container">
        <div class="row justify-content center" style="padding-top: 1.4em;">
            <div class="col-3">
                <h1>Users</h1>
            </div>
            <div class="col-3 offset-6">
                <a href="users/create"><input style="border-color: var(--yellow);" class="btn" type="button" value="Add User"></a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)


            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_id == 1 ? 'Admin' : 'User'}}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>

                </tr>
            @endforeach

            @endif
        </tbody>
    </table>

@endsection
