
@extends('layouts.admin')



@section('content')

    <div class="row" style="padding-top: 1.4em;">
        <div>
            <h3>Users</h3>
        </div>
        <div>
            <a href="users/create"><input class="btn btn--p" type="button" value="Add User"></a>
        </div>
    </div>
    <div class="row">
    <table class="highlight responsive-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
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
                    <td><a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn--p bgc--yellow">Edit User</a></td>
                </tr>
            @endforeach

            @endif
        </tbody>
    </table>
    </div>
@endsection

