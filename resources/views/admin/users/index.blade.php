@extends('layouts.admin')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h1>Users</h1>
            </div>
            <div class="col-3 offset-6">
                <a href="admin/create"><input style="border-color: var(--yellow);" class="btn" type="button" value="Add User"></a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)


            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>

                </tr>
            @endforeach

            @endif
        </tbody>
    </table>

@endsection
