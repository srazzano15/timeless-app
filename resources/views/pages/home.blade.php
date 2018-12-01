@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <h1>Dashboard</h1>
        </div>
        <div class="row justify-content-center">
            <span>Review the stuffed batches awaiting to be run or submit a new batch now!</span>
        </div>
        @include('inc.DataTable')
    </div>

@endsection


{{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body" id="homeSuccess">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}

