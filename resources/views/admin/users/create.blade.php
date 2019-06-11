@extends('layouts.admin')


@section('content')

<add-user form-route="{{ route('users.store') }}">
    <template v-slot:csrf>
        @csrf
    </template>
</add-user>


    {{-- <form action="{{ route('users.store') }}" method="post" style="padding-top: 25px;">
        @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                    
                    <input type="email" class="form-control" name="email" id="createEmail" 
                    aria-describedby="newUserEmail">
                    <label for="createEmail">Email</label>
                    <small id="newUserEmail" class="form-text" style="color: var(--yellow)">Please include the email to generate a new invite code!</small>
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
            </div>
        <button type="submit" class="btn btn--p" name="submitEmail">Submit</button>
    </form>
    <div class="row">
        <h3 style="margin-top: 1.5em">Outstanding Invites</h3>
    </div>
    <div class="row">
        <table class="highlight responsive-table">
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
 --}}

@endsection

