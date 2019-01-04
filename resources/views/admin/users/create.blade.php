@extends('layouts.admin')


@section('content')

<div class="container">
    <form action="{{ route('users.store') }}" method="post" style="padding-top: 25px;">
        @csrf
            <div class="form-group">
                <div class="col-6">
                    <label for="createEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="createEmail" aria-describedby="newUserEmail" placeholder="newuser@timeless.com">
                    <small id="newUserEmail" class="form-text" style="color: var(--yellow)">Please include the email to generate a new invite code!</small>
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
            </div>
        <button type="submit" class="btn btn-dark" name="submitEmail">Submit</button>
    </form>
    <h1 style="margin-top: 1.5em">Outstanding Invites</h1>
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Invite Code</th>
                        <th>Email Associated</th>
                        <th>Date Generated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invites as $inv)
                        <tr>
                            <td>{{ $inv->code }}</td>
                            <td>{{ $inv->for }}</td>
                            <td>{{ $inv->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>


@endsection

