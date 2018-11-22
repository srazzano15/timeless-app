@extends('layouts.app')

@section('content')
    
    @include('inc.batchform')

@endsection
@push('scripts')
    <script src="{{asset('/js/app.js')}}">console.log('hello 1')</script>
@endpush


