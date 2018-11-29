@extends('layouts.app')

@section('content')


    @include('inc.batchform')

@endsection
@push('scripts')
    <script src="{{asset('/js/app.js')}}"></script>
@endpush


