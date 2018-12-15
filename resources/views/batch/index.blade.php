@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Stuffed Batches</h1>
    </div>
    <div class="row justify-content-center">
        <span>Review the stuffed batches awaiting to be run or submit a new batch now!</span>
    </div>
        @include('inc.DataTable')
</div>
@endsection
