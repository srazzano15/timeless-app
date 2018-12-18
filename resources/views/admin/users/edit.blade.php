@extends('layouts.admin')

@section('content')


<div class="container">
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PATCH')

        <h1>Edit Users</h1>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" aria-describedby="usersName" placeholder="">
        </div>

        <button type="submit" name="submit">Update</button>

    </form>

</div>


@endsection
